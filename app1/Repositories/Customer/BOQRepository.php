<?php
namespace App\Repositories\Customer;

use App\Repositories\BaseRepository;
use App\Models\BOQ\BoqQuotation;
use App\Models\Buyer\Buyer;
use App\Models\BOQ\BoqMainItem;
use App\Models\BOQ\BoqSubItem;
use App\Models\BOQ\QSBoqMainItem;
use App\Models\BOQ\QSBoqSubItem;
use App\Models\BOQ\BoqMappedWithContractorType;
use App\Models\BOQ\BoqMappedWithContractor;
use App\Models\BOQ\BoqMappedWithArchitect;
use App\Models\BOQ\BoqSentToByQuantitySurveyor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BOQRepository extends BaseRepository
{
    public function saveBOQ($request)
    {
        try {
            $user = Auth::guard('buyer')->user();

            $request->merge([
                'created_by'         => $user->account_type,
                'created_by_user_id' => $user->id,
            ]);

            // ── File uploads ──────────────────────────────────────────────
            foreach (['one', 'two', 'three', 'four'] as $suffix) {
                $field = "attachment_{$suffix}";
                if ($request->hasFile($field)) {
                    $request->request->add([
                        "attachment_file_{$suffix}" => $this->handleSingleFileUpload(
                            $request->$field, 'uploads/rfq/'
                        )
                    ]);
                }
            }

            // ── Status resolution ─────────────────────────────────────────
            if ($request->want_to_revised == 1) {
                $request->merge(['parent_id' => $request->boq_id]);
            }

            if ($request->is_form_filled_developer == 1) {
                $request->merge(['status' => 'Sent To Architects']);
            } elseif (
                in_array($request->project_sent_to, ['Contractor Type', 'Direct Contractor'])
                && !is_array($request->quantity_surveyors)
            ) {
                $request->merge(['status' => 'Sent to Contractor']);
            } elseif ($request->is_form_filled == 1 && !is_array($request->quantity_surveyors)) {
                $request->merge(['status' => 'Architect Start Wroking']);
            } elseif (is_array($request->quantity_surveyors)) {
                $request->merge(['status' => 'Sent to Quantity Surveyors']);
            }

            // ── Wrap everything in a single transaction ───────────────────
            $boq = DB::transaction(function () use ($request) {

                $fillable = [
                    'project_name', 'client_name', 'developer_amount', 'boq_type',
                    'project_sent_to', 'project_need', 'project_address', 'project_city',
                    'project_area', 'boq_deadline', 'validity_date',
                    'attachment_file_one', 'attachment_file_two',
                    'attachment_file_three', 'attachment_file_four',
                    'is_form_filled', 'is_form_filled_developer', 'status',
                ];

                if (!empty($request->boq_id) && $request->want_to_revised != 1) {
                    // ── UPDATE existing BOQ ───────────────────────────────
                    $boq = BoqQuotation::findOrFail($request->boq_id);
                    $boq->update($request->only($fillable));
                } else {
                    // ── CREATE new / revised BOQ ──────────────────────────
                    if ($request->want_to_revised == 1) {
                        $revisedCount = BoqQuotation::where('parent_id', $request->boq_id)->count();
                        $request->merge(['boq_id_counter' => "{$request->boq_id}-" . ($revisedCount + 1)]);
                    }
                    $boq = BoqQuotation::create(
                        $request->only(array_merge(
                            ['created_by', 'created_by_user_id', 'parent_id',
                             'project_need', 'boq_id_counter'],
                            $fillable
                        ))
                    );
                }

                // ── BOQ Items ─────────────────────────────────────────────
                if (is_array($request->items)) {
                    $this->saveBoqItems($request);
                }

                // ── Mappings (bulk inserts, no per-row queries) ───────────
                if (is_array($request->contractor_type) && $request->project_sent_to === 'Contractor Type') {
                    $this->mapContractorTypeToBoq($request, $boq->id);
                }

                if (is_array($request->contractors) && $request->project_sent_to === 'Direct Contractor') {
                    $this->mapContractorToBoq($request, $boq->id);
                }

                if (is_array($request->quantity_surveyors)) {
                    $this->mapBoqToQuantitySurveyor($request, $boq->id);
                }

                if (is_array($request->architects)) {
                    $this->mapArchitectToBoq($request, $boq->id);
                }

                return $boq;
            });

            // ── Notifications (outside transaction — non-critical) ────────
            $this->dispatchBOQNotifications($request, $boq);

            return $boq;

        } catch (\Throwable $e) {
            return $this->errorResponse(
                [], 'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(), 404
            );
        }
    }

    // =========================================================================
    //  MAPPING HELPERS  — all use bulk INSERT, zero per-row DB queries
    // =========================================================================

    public function mapBoqToQuantitySurveyor($request, $boqID)
    {
        if (empty($request->quantity_surveyors)) return;

        $ids = is_array($request->quantity_surveyors)
            ? $request->quantity_surveyors
            : explode(',', $request->quantity_surveyors);

        if (empty($ids)) return;

        $data = array_map(fn($id) => ['boq_id' => $boqID, 'quantity_surveyor_id' => $id], $ids);

        // Single delete + single bulk insert
        DB::transaction(function () use ($boqID, $data) {
            BoqSentToByQuantitySurveyor::where('boq_id', $boqID)->delete();
            BoqSentToByQuantitySurveyor::insert($data);
        });
    }

    public function mapArchitectToBoq($request, $boqID)
    {
        if (empty($request->architects)) return;

        $ids = is_array($request->architects)
            ? $request->architects
            : explode(',', $request->architects);

        if (empty($ids)) return;

        $data = array_map(fn($id) => ['boq_id' => $boqID, 'architect_id' => $id], $ids);

        DB::transaction(function () use ($boqID, $data) {
            BoqMappedWithArchitect::where('boq_id', $boqID)->delete();
            BoqMappedWithArchitect::insert($data);
        });
    }

    public function mapContractorToBoq($request, $boqID)
    {
        if (empty($request->contractors)) return;

        $ids = is_array($request->contractors)
            ? $request->contractors
            : explode(',', $request->contractors);

        if (empty($ids)) return;

        $data = array_map(fn($id) => ['boq_id' => $boqID, 'contractor_id' => $id], $ids);

        DB::transaction(function () use ($boqID, $data) {
            BoqMappedWithContractor::where('boq_id', $boqID)->delete();
            BoqMappedWithContractor::insert($data);
        });
    }

    public function mapContractorTypeToBoq($request, $boqID)
    {
        if (empty($request->contractor_type)) return;

        $types = is_array($request->contractor_type)
            ? $request->contractor_type
            : explode(',', $request->contractor_type);

        if (empty($types)) return;

        $data = array_map(fn($type) => ['boq_id' => $boqID, 'contractor_type' => $type], $types);

        DB::transaction(function () use ($boqID, $data) {
            BoqMappedWithContractorType::where('boq_id', $boqID)->delete();
            BoqMappedWithContractorType::insert($data);
        });
    }

    // =========================================================================
    //  BOQ ITEMS  — bulk insert main items too (no create() inside loop)
    // =========================================================================

    public function saveBoqItems($request)
    {
        if (empty($request->items)) return true;

        $firstItem = collect($request->items)->first();
        if (empty($firstItem['category_id'])) return true;

        // Delete old records in one go
        $mainItemIds = BoqMainItem::where('boq_id', $request->boq_id)->pluck('id');
        if ($mainItemIds->isNotEmpty()) {
            BoqSubItem::whereIn('main_item_id', $mainItemIds)->delete();
        }
        BoqMainItem::where('boq_id', $request->boq_id)->delete();

        $mainItemsData = [];
        $categoryOrder = [];

        foreach ($request->items as $idx => $item) {
            $mainItemsData[] = [
                'boq_id'      => $request->boq_id,
                'category_id' => $item['category_id'],
                // add created_at/updated_at if your model doesn't auto-manage them
            ];
            $categoryOrder[$idx] = $item['category_items'] ?? [];
        }

        // Bulk insert main items, then fetch their IDs in order
        BoqMainItem::insert($mainItemsData);

        $insertedMainItems = BoqMainItem::where('boq_id', $request->boq_id)
            ->orderBy('id')
            ->pluck('id')
            ->values();

        $subItems = [];
        foreach ($categoryOrder as $idx => $categoryItems) {
            $mainItemId = $insertedMainItems[$idx] ?? null;
            if (!$mainItemId) continue;

            foreach ($categoryItems as $sub_item) {
                $singleItem = [
                    'boq_id'           => $request->boq_id,
                    'main_item_id'     => $mainItemId,
                    'sub_category'     => $sub_item['sub_category'],
                    'sub_sub_category' => $sub_item['sub_sub_category'] ?? null,
                    'description'      => $sub_item['description'],
                    'unit'             => $sub_item['unit'],
                    'quantity'         => $sub_item['quantity'],
                    'rate'             => $sub_item['rate'],
                    'amount'           => $sub_item['amount'],
                    'reference_file'   => null,
                ];

                if (!empty($sub_item['attachment'])) {
                    $singleItem['reference_file'] = $this->handleSingleFileUpload(
                        $sub_item['attachment'], 'uploads/rfq/'
                    );
                }

                $subItems[] = $singleItem;
            }
        }

        if (!empty($subItems)) {
            // Chunk to avoid hitting DB placeholder limits on large payloads
            foreach (array_chunk($subItems, 500) as $chunk) {
                BoqSubItem::insert($chunk);
            }
        }

        return true;
    }

    public function saveQSBoqItems($request)
    {
        if (empty($request->items)) return true;

        $qs        = auth()->user();
        $firstItem = collect($request->items)->first();
        if (empty($firstItem['category_id'])) return true;

        $mainItemIds = QSBoqMainItem::where('boq_id', $request->boq_id)->pluck('id');
        if ($mainItemIds->isNotEmpty()) {
            QSBoqSubItem::whereIn('main_item_id', $mainItemIds)->delete();
        }
        QSBoqMainItem::where('boq_id', $request->boq_id)->delete();

        $mainItemsData = [];
        $categoryOrder = [];

        foreach ($request->items as $idx => $item) {
            $mainItemsData[] = [
                'qs_id'       => $qs->id,
                'boq_id'      => $request->boq_id,
                'category_id' => $item['category_id'],
            ];
            $categoryOrder[$idx] = $item['category_items'] ?? [];
        }

        QSBoqMainItem::insert($mainItemsData);

        $insertedMainItems = QSBoqMainItem::where('boq_id', $request->boq_id)
            ->orderBy('id')
            ->pluck('id')
            ->values();

        $subItems = [];
        foreach ($categoryOrder as $idx => $categoryItems) {
            $mainItemId = $insertedMainItems[$idx] ?? null;
            if (!$mainItemId) continue;

            foreach ($categoryItems as $sub_item) {
                $singleItem = [
                    'boq_id'           => $request->boq_id,
                    'main_item_id'     => $mainItemId,
                    'sub_category'     => $sub_item['sub_category'],
                    'sub_sub_category' => $sub_item['sub_sub_category'] ?? null,
                    'description'      => $sub_item['description'],
                    'unit'             => $sub_item['unit'],
                    'quantity'         => $sub_item['quantity'],
                    'rate'             => $sub_item['rate'],
                    'amount'           => $sub_item['amount'],
                    'reference_file'   => null,
                ];

                if (!empty($sub_item['attachment'])) {
                    $singleItem['reference_file'] = $this->handleSingleFileUpload(
                        $sub_item['attachment'], 'uploads/rfq/'
                    );
                }

                $subItems[] = $singleItem;
            }
        }

        if (!empty($subItems)) {
            foreach (array_chunk($subItems, 500) as $chunk) {
                QSBoqSubItem::insert($chunk);
            }
        }

        return true;
    }

    public function saveIndividualCategoryGroup($request)
    {
        try {
            if (empty($request->items)) return true;

            $firstItem = collect($request->items)->first();
            if (empty($firstItem['category_id'])) return true;

            $existingMain = BoqMainItem::where('boq_id', $request->boq_id)
                ->where('category_id', $firstItem['category_id'])
                ->first();

            if ($existingMain) {
                BoqSubItem::where('main_item_id', $existingMain->id)->delete();
                $existingMain->delete();
            }

            $mainItemsData = [];
            $categoryOrder = [];

            foreach ($request->items as $idx => $item) {
                $mainItemsData[] = [
                    'boq_id'      => $request->boq_id,
                    'category_id' => $item['category_id'],
                ];
                $categoryOrder[$idx] = $item['category_items'] ?? [];
            }

            BoqMainItem::insert($mainItemsData);

            $insertedMainItems = BoqMainItem::where('boq_id', $request->boq_id)
                ->where('category_id', $firstItem['category_id'])
                ->orderBy('id')
                ->pluck('id')
                ->values();

            $subItems = [];
            foreach ($categoryOrder as $idx => $categoryItems) {
                $mainItemId = $insertedMainItems[$idx] ?? null;
                if (!$mainItemId) continue;

                foreach ($categoryItems as $sub_item) {
                    $singleItem = [
                        'boq_id'           => $request->boq_id,
                        'main_item_id'     => $mainItemId,
                        'sub_category'     => $sub_item['sub_category'],
                        'sub_sub_category' => $sub_item['sub_sub_category'] ?? null,
                        'description'      => $sub_item['description'],
                        'unit'             => $sub_item['unit'],
                        'quantity'         => $sub_item['quantity'],
                        'rate'             => $sub_item['rate'],
                        'amount'           => $sub_item['amount'],
                        'reference_file'   => null,
                    ];

                    if (!empty($sub_item['attachment'])) {
                        $singleItem['reference_file'] = $this->handleSingleFileUpload(
                            $sub_item['attachment'], 'uploads/rfq/'
                        );
                    }

                    $subItems[] = $singleItem;
                }
            }

            if (!empty($subItems)) {
                foreach (array_chunk($subItems, 500) as $chunk) {
                    BoqSubItem::insert($chunk);
                }
            }

            return true;

        } catch (\Throwable $e) {
            return $this->errorResponse(
                [], 'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(), 404
            );
        }
    }

    // =========================================================================
    //  STATUS CHANGERS
    // =========================================================================

    public function changeQSBOQStatus($request)
    {
        try {
            $user     = auth()->user();
            $mappedBoq = BoqSentToByQuantitySurveyor::where('quantity_surveyor_id', $request->qs_id)
                ->where('boq_id', $request->boq_id)
                ->firstOrFail();

            $mappedBoq->status           = $request->status           ?? $mappedBoq->status;
            $mappedBoq->status_changed_by = $user->account_type;
            $mappedBoq->amount           = (!empty($request->amount) && $request->amount != 0)
                ? $request->amount : $mappedBoq->amount;
            $mappedBoq->transaction_date  = !empty($request->transaction_date)
                ? $request->transaction_date : $mappedBoq->transaction_date;
            $mappedBoq->transaction_id    = !empty($request->transaction_id)
                ? $request->transaction_id  : $mappedBoq->transaction_id;
            $mappedBoq->save();

            if ($request->status === 'Payment Done') {
                BoqQuotation::where('id', $request->boq_id)->update(['status' => 'Assign To Contractor']);
            }

            return true;

        } catch (\Throwable $e) {
            return $this->errorResponse(
                [], 'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(), 404
            );
        }
    }

    public function changeArchitectBOQStatus($request)
    {
        try {
            $user     = auth()->user();
            $mappedBoq = BoqMappedWithArchitect::where('architect_id', $request->architect_id)
                ->where('boq_id', $request->boq_id)
                ->firstOrFail();

            $mappedBoq->status           = $request->status           ?? $mappedBoq->status;
            $mappedBoq->status_changed_by = $user->account_type;
            $mappedBoq->amount           = (!empty($request->amount) && $request->amount != 0)
                ? $request->amount : $mappedBoq->amount;
            $mappedBoq->transaction_date  = !empty($request->transaction_date)
                ? $request->transaction_date : $mappedBoq->transaction_date;
            $mappedBoq->transaction_id    = !empty($request->transaction_id)
                ? $request->transaction_id  : $mappedBoq->transaction_id;
            $mappedBoq->save();

            if ($request->status === 'Payment Done') {
                BoqQuotation::where('id', $request->boq_id)->update(['status' => 'Assign To Architect']);
            }

            // Notifications for architect status change (outside save loop)
            $this->dispatchArchitectStatusNotifications($request, $user);

            return true;

        } catch (\Throwable $e) {
            return $this->errorResponse(
                [], 'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(), 404
            );
        }
    }

    // =========================================================================
    //  READ HELPERS
    // =========================================================================

    public function getPurposeArchitectsByDeveloper($boqId)
    {
        try {
            return BoqMappedWithArchitect::where('boq_id', $boqId)->with('architect')->get();
        } catch (\Throwable $e) {
            return $this->errorResponse(
                [], 'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(), 404
            );
        }
    }

    public function getProposeQsByArchitect($boqId)
    {
        try {
            return BoqSentToByQuantitySurveyor::where('boq_id', $boqId)->with('qs')->get();
        } catch (\Throwable $e) {
            return $this->errorResponse(
                [], 'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(), 404
            );
        }
    }

    // =========================================================================
    //  NOTIFICATION HELPERS  — called after DB work completes
    // =========================================================================

    /**
     * Fire all BOQ-creation / assignment notifications in one place.
     * Fetch tokens in bulk (one query per user-type) instead of one per row.
     */
    protected function dispatchBOQNotifications($request, $boq)
    {
        $boqID = $boq->id;

        // ── Notify the creator ────────────────────────────────────────────
        if ($request->is_form_filled == 1) {
            $creator = Auth::guard('buyer')->user();
            if (!empty($creator->device_token)) {
                SendFirebaseNotification(
                    $creator->device_token,
                    "BOQ Created",
                    "You have created BOQ #{$boqID} Successfully!",
                    $creator->id,
                    'Buyer'
                );
            }
        }

        // ── Notify assigned Quantity Surveyors (bulk fetch) ───────────────
        if (is_array($request->quantity_surveyors) && !empty($request->quantity_surveyors)) {
            $qsUsers = Buyer::whereIn('id', $request->quantity_surveyors)
                ->whereNotNull('device_token')
                ->where('device_token', '!=', '')
                ->get(['id', 'device_token']);

            foreach ($qsUsers as $u) {
                SendFirebaseNotification(
                    $u->device_token,
                    "BOQ Assigned",
                    "You have been assigned BOQ #{$boqID}!",
                    $u->id,
                    'Buyer'
                );
            }
        }

        // ── Notify assigned Architects (bulk fetch) ───────────────────────
        if (is_array($request->architects) && !empty($request->architects)) {
            $archUsers = Buyer::whereIn('id', $request->architects)
                ->whereNotNull('device_token')
                ->where('device_token', '!=', '')
                ->get(['id', 'device_token']);

            foreach ($archUsers as $u) {
                SendFirebaseNotification(
                    $u->device_token,
                    "BOQ Assigned",
                    "You have been assigned BOQ #{$boqID}!",
                    $u->id,
                    'Buyer'
                );
            }
        }

        // ── Notify assigned Direct Contractors (bulk fetch) ───────────────
        if (is_array($request->contractors) && !empty($request->contractors)) {
            $contractorUsers = Buyer::whereIn('id', $request->contractors)
                ->whereNotNull('device_token')
                ->where('device_token', '!=', '')
                ->get(['id', 'device_token']);

            foreach ($contractorUsers as $u) {
                SendFirebaseNotification(
                    $u->device_token,
                    "BOQ Assigned",
                    "You have been assigned BOQ #{$boqID}!",
                    $u->id,
                    'Buyer'
                );
            }
        }

        // ── Notify Contractor-Type contractors (bulk fetch) ───────────────
        if (is_array($request->contractor_type) && !empty($request->contractor_type)) {
            $typeUsers = Buyer::whereJsonContains('contractor_type', $request->contractor_type)
                ->whereNotNull('device_token')
                ->where('device_token', '!=', '')
                ->get(['id', 'device_token']);

            foreach ($typeUsers as $u) {
                SendFirebaseNotification(
                    $u->device_token,
                    "BOQ Assigned",
                    "You have been assigned BOQ #{$boqID}!",
                    $u->id,
                    'Buyer'
                );
            }
        }
    }

    protected function dispatchArchitectStatusNotifications($request, $actingUser)
    {
        $boqID = $request->boq_id;

        // Notify the acting user
        $actor = Buyer::find($actingUser->id, ['id', 'device_token']);
        if ($actor && !empty($actor->device_token)) {
            SendFirebaseNotification(
                $actor->device_token,
                "BOQ Status",
                "BOQ #{$boqID} status has been updated!",
                $actor->id,
                'Buyer'
            );
        }

        // Notify the architect
        $architect = Buyer::where('id', $request->architect_id)
            ->whereNotNull('device_token')
            ->where('device_token', '!=', '')
            ->first(['id', 'device_token']);

        if ($architect) {
            SendFirebaseNotification(
                $architect->device_token,
                "BOQ Status",
                "BOQ #{$boqID} status has been updated!",
                $architect->id,
                'Buyer'
            );
        }
    }
}