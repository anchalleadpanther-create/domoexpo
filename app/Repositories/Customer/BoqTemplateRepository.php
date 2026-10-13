<?php

namespace App\Repositories\Customer;

use App\Repositories\BaseRepository;
use App\Models\BOQ\BoqTemplate;
use App\Models\BOQ\BoqTemplateCategory;
use App\Models\BOQ\BoqTemplateItem;
use App\Models\BOQ\BoqMainItem;
use App\Models\BOQ\BoqSubItem;
use App\Models\BOQ\QSBoqAppliedTemplate;
use App\Models\BOQ\QSBoqMainItem;
use App\Models\BOQ\QSBoqSubItem;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BoqTemplateRepository extends BaseRepository
{
    public function getTemplatesForUser(int $userId)
    {
        return BoqTemplate::where('created_by_user_id', $userId)
            ->orderByDesc('created_at')
            ->get();
    }

    public function getTemplateForUser(int $templateId, int $userId): BoqTemplate
    {
        return BoqTemplate::where('id', $templateId)
            ->where('created_by_user_id', $userId)
            ->with([
                'categories' => fn ($q) => $q->orderBy('sort_order'),
                'categories.category',
                'categories.items.subCategoryRelation',
                'categories.items.subSubCategoryRelation',
            ])
            ->firstOrFail();
    }

    public function saveFromBoq(int $boqId, int $userId, string $name, ?string $templateType = null, ?array $items = null, ?Request $request = null, string $source = 'qs'): BoqTemplate
    {
        return $this->saveFromProjectBoq($boqId, $userId, $name, $templateType, $items, $request, $source);
    }

    public function saveFromProjectBoq(int $boqId, int $userId, string $name, ?string $templateType = null, ?array $items = null, ?Request $request = null, string $source = 'qs'): BoqTemplate
    {
        $dbMainItems = $source === 'architect'
            ? $this->loadArchitectBoqStructure($boqId)
            : $this->loadQsBoqStructure($boqId, $userId);

        $dbItemCount = $dbMainItems->sum(fn ($m) => $m->getSubItem->count());
        $requestItemCount = $this->countRequestItems($items);

        if ($this->requestItemsHaveData($items) && $requestItemCount >= $dbItemCount) {
            return $this->saveFromItemsArray($userId, $name, $templateType, $items, $request);
        }

        if ($dbItemCount > 0) {
            return DB::transaction(fn () => $this->persistTemplateFromMainItems($userId, $name, $templateType, $dbMainItems));
        }

        if ($this->requestItemsHaveData($items)) {
            return $this->saveFromItemsArray($userId, $name, $templateType, $items, $request);
        }

        throw new \RuntimeException('No BOQ items found to save as template.');
    }

    protected function saveFromItemsArray(int $userId, string $name, ?string $templateType, array $items, ?Request $request = null): BoqTemplate
    {
        return DB::transaction(function () use ($userId, $name, $templateType, $items, $request) {
            $itemsCount = 0;

            $template = BoqTemplate::create([
                'created_by_user_id' => $userId,
                'name'               => $name,
                'template_type'      => $templateType,
                'items_count'        => 0,
            ]);

            foreach ($items as $sortOrder => $item) {
                if (empty($item['category_id'])) {
                    continue;
                }

                $templateCategory = BoqTemplateCategory::create([
                    'template_id'  => $template->id,
                    'category_id'  => $item['category_id'],
                    'sort_order'   => $sortOrder,
                ]);

                foreach ($item['category_items'] ?? [] as $subKey => $subItem) {
                    if (!$this->subItemHasContent($subItem)) {
                        continue;
                    }

                    BoqTemplateItem::create(
                        $this->buildTemplateItemPayload($templateCategory->id, $subItem, $request, $sortOrder, $subKey)
                    );
                    $itemsCount++;
                }
            }

            if ($itemsCount === 0) {
                throw new \RuntimeException('No BOQ items found to save as template.');
            }

            $template->update(['items_count' => $itemsCount]);

            return $template->fresh(['categories.items']);
        });
    }

    protected function persistTemplateFromMainItems(int $userId, string $name, ?string $templateType, Collection $mainItems): BoqTemplate
    {
        $itemsCount = 0;

        $template = BoqTemplate::create([
            'created_by_user_id' => $userId,
            'name'               => $name,
            'template_type'      => $templateType,
            'items_count'        => 0,
        ]);

        foreach ($mainItems as $sortOrder => $mainItem) {
            $templateCategory = BoqTemplateCategory::create([
                'template_id'  => $template->id,
                'category_id'  => $mainItem->category_id,
                'sort_order'   => $sortOrder,
            ]);

            $subItems = $mainItem->relationLoaded('getSubItem')
                ? $mainItem->getSubItem
                : $this->loadSubItemsForMainItem($mainItem);

            foreach ($subItems as $subItem) {
                BoqTemplateItem::create($this->mapSubItemToTemplateRow($templateCategory->id, $subItem));
                $itemsCount++;
            }
        }

        $template->update(['items_count' => $itemsCount]);

        return $template->fresh(['categories.items']);
    }

    protected function mapSubItemToTemplateRow(int $templateCategoryId, $subItem): array
    {
        return [
            'template_category_id' => $templateCategoryId,
            'sub_category'         => $subItem->sub_category,
            'sub_sub_category'     => $subItem->sub_sub_category,
            'description'          => $subItem->description,
            'unit'                 => $subItem->unit,
            'quantity'             => $subItem->quantity ?? 0,
            'rate'                 => $subItem->rate ?? 0,
            'amount'               => $subItem->amount ?? 0,
            'reference_file'       => $subItem->reference_file,
        ];
    }

    protected function loadSubItemsForMainItem($mainItem): Collection
    {
        if ($mainItem instanceof QSBoqMainItem) {
            return QSBoqSubItem::where('main_item_id', $mainItem->id)->orderBy('id')->get();
        }

        return BoqSubItem::where('main_item_id', $mainItem->id)->orderBy('id')->get();
    }

    protected function loadArchitectBoqStructure(int $boqId): Collection
    {
        return BoqMainItem::where('boq_id', $boqId)
            ->orderBy('id')
            ->get()
            ->each(function ($mainItem) {
                $mainItem->setRelation(
                    'getSubItem',
                    BoqSubItem::where('main_item_id', $mainItem->id)->orderBy('id')->get()
                );
            });
    }

    protected function loadQsBoqStructure(int $boqId, int $qsId): Collection
    {
        return QSBoqMainItem::where('boq_id', $boqId)
            ->where('qs_id', $qsId)
            ->orderBy('id')
            ->get()
            ->each(function ($mainItem) {
                $mainItem->setRelation(
                    'getSubItem',
                    QSBoqSubItem::where('main_item_id', $mainItem->id)->orderBy('id')->get()
                );
            });
    }

    protected function buildTemplateItemPayload(int $templateCategoryId, array $subItem, ?Request $request, int $sortOrder, $subKey): array
    {
        $referenceFile = $subItem['reference_file'] ?? null;

        if ($request && $request->hasFile("items.{$sortOrder}.category_items.{$subKey}.attachment")) {
            $referenceFile = $this->handleSingleFileUpload(
                $request->file("items.{$sortOrder}.category_items.{$subKey}.attachment"),
                'uploads/rfq/'
            );
        }

        return [
            'template_category_id' => $templateCategoryId,
            'sub_category'         => $subItem['sub_category'] ?? null,
            'sub_sub_category'     => $subItem['sub_sub_category'] ?? null,
            'description'          => $subItem['description'] ?? null,
            'unit'                 => $subItem['unit'] ?? null,
            'quantity'             => (float) ($subItem['quantity'] ?? 0),
            'rate'                 => (float) ($subItem['rate'] ?? 0),
            'amount'               => (float) ($subItem['amount'] ?? 0),
            'reference_file'       => $referenceFile,
        ];
    }

    protected function subItemHasContent(array $subItem): bool
    {
        return !empty($subItem['sub_category'])
            || !empty($subItem['description'])
            || !empty($subItem['unit'])
            || !empty($subItem['quantity'])
            || !empty($subItem['rate']);
    }

    protected function requestItemsHaveData(?array $items): bool
    {
        return $this->countRequestItems($items) > 0;
    }

    protected function countRequestItems(?array $items): int
    {
        if (!is_array($items) || empty($items)) {
            return 0;
        }

        $count = 0;
        foreach ($items as $item) {
            if (empty($item['category_id'])) {
                continue;
            }
            foreach ($item['category_items'] ?? [] as $subItem) {
                if ($this->subItemHasContent($subItem)) {
                    $count++;
                }
            }
        }

        return $count;
    }

    public function importToBoq(int $templateId, int $boqId, int $userId, string $source = 'qs'): bool
    {
        return $this->importToProjectBoq($templateId, $boqId, $userId, $source);
    }

    public function importToProjectBoq(int $templateId, int $boqId, int $userId, string $source = 'qs'): bool
    {
        return DB::transaction(function () use ($templateId, $boqId, $userId, $source) {
            $template = BoqTemplate::where('id', $templateId)
                ->where('created_by_user_id', $userId)
                ->with(['categories.items'])
                ->firstOrFail();

            if ($source === 'architect') {
                $this->importTemplateToArchitectBoq($template, $boqId);
            } else {
                $this->importTemplateToQsBoq($template, $boqId, $userId);
            }

            $this->setAppliedTemplateForProject($boqId, $userId, $templateId);

            return true;
        });
    }

    protected function importTemplateToArchitectBoq(BoqTemplate $template, int $boqId): void
    {
        $existingMainIds = BoqMainItem::where('boq_id', $boqId)->pluck('id');

        if ($existingMainIds->isNotEmpty()) {
            BoqSubItem::whereIn('main_item_id', $existingMainIds)->delete();
        }
        BoqMainItem::where('boq_id', $boqId)->delete();

        foreach ($template->categories as $category) {
            $mainItem = BoqMainItem::create([
                'boq_id'      => $boqId,
                'category_id' => $category->category_id,
            ]);

            foreach ($category->items as $item) {
                BoqSubItem::create([
                    'boq_id'           => $boqId,
                    'main_item_id'     => $mainItem->id,
                    'sub_category'     => $item->sub_category,
                    'sub_sub_category' => $item->sub_sub_category,
                    'description'      => $item->description,
                    'unit'             => $item->unit,
                    'quantity'         => $item->quantity ?? 0,
                    'rate'             => $item->rate ?? 0,
                    'amount'           => $item->amount ?? 0,
                    'reference_file'   => $item->reference_file,
                ]);
            }
        }
    }

    protected function importTemplateToQsBoq(BoqTemplate $template, int $boqId, int $userId): void
    {
        $existingMainIds = QSBoqMainItem::where('boq_id', $boqId)
            ->where('qs_id', $userId)
            ->pluck('id');

        if ($existingMainIds->isNotEmpty()) {
            QSBoqSubItem::whereIn('main_item_id', $existingMainIds)->delete();
        }
        QSBoqMainItem::where('boq_id', $boqId)->where('qs_id', $userId)->delete();

        foreach ($template->categories as $category) {
            $mainItem = QSBoqMainItem::create([
                'qs_id'       => $userId,
                'boq_id'      => $boqId,
                'category_id' => $category->category_id,
            ]);

            foreach ($category->items as $item) {
                QSBoqSubItem::create([
                    'boq_id'           => $boqId,
                    'main_item_id'     => $mainItem->id,
                    'sub_category'     => $item->sub_category,
                    'sub_sub_category' => $item->sub_sub_category,
                    'description'      => $item->description,
                    'unit'             => $item->unit,
                    'quantity'         => $item->quantity ?? 0,
                    'rate'             => $item->rate ?? 0,
                    'amount'           => $item->amount ?? 0,
                    'reference_file'   => $item->reference_file,
                ]);
            }
        }
    }

    public function getAppliedTemplateForProject(int $boqId, int $qsId): ?BoqTemplate
    {
        $applied = QSBoqAppliedTemplate::where('boq_id', $boqId)
            ->where('qs_id', $qsId)
            ->with('template')
            ->first();

        return $applied?->template;
    }

    public function setAppliedTemplateForProject(int $boqId, int $qsId, int $templateId): void
    {
        QSBoqAppliedTemplate::updateOrCreate(
            ['boq_id' => $boqId, 'qs_id' => $qsId],
            ['template_id' => $templateId]
        );
    }

    public function clearAppliedTemplateForProject(int $boqId, int $qsId): void
    {
        QSBoqAppliedTemplate::where('boq_id', $boqId)->where('qs_id', $qsId)->delete();
    }

    public function duplicateTemplate(int $templateId, int $userId): BoqTemplate
    {
        return DB::transaction(function () use ($templateId, $userId) {
            $source = BoqTemplate::where('id', $templateId)
                ->where('created_by_user_id', $userId)
                ->with(['categories.items'])
                ->firstOrFail();

            $duplicate = BoqTemplate::create([
                'created_by_user_id' => $userId,
                'name'               => $source->name . ' (Copy)',
                'template_type'      => $source->template_type,
                'items_count'        => $source->items_count,
            ]);

            foreach ($source->categories as $category) {
                $newCategory = BoqTemplateCategory::create([
                    'template_id' => $duplicate->id,
                    'category_id' => $category->category_id,
                    'sort_order'  => $category->sort_order,
                ]);

                foreach ($category->items as $item) {
                    BoqTemplateItem::create([
                        'template_category_id' => $newCategory->id,
                        'sub_category'         => $item->sub_category,
                        'sub_sub_category'     => $item->sub_sub_category,
                        'description'          => $item->description,
                        'unit'                 => $item->unit,
                        'quantity'             => $item->quantity ?? 0,
                        'rate'                 => $item->rate,
                        'amount'               => $item->amount ?? 0,
                        'reference_file'       => $item->reference_file,
                    ]);
                }
            }

            return $duplicate;
        });
    }

    public function deleteTemplate(int $templateId, int $userId): bool
    {
        return DB::transaction(function () use ($templateId, $userId) {
            $template = BoqTemplate::where('id', $templateId)
                ->where('created_by_user_id', $userId)
                ->firstOrFail();

            QSBoqAppliedTemplate::where('template_id', $template->id)->delete();

            return (bool) $template->delete();
        });
    }

    public function createTemplateFromItems(int $userId, string $name, ?string $templateType, array $items, ?Request $request = null): BoqTemplate
    {
        return $this->saveFromItemsArray($userId, $name, $templateType, $items, $request);
    }

    public function updateTemplateFromItems(
        int $templateId,
        int $userId,
        string $name,
        ?string $templateType,
        array $items,
        ?Request $request = null
    ): BoqTemplate {
        return DB::transaction(function () use ($templateId, $userId, $name, $templateType, $items, $request) {
            $template = BoqTemplate::where('id', $templateId)
                ->where('created_by_user_id', $userId)
                ->with('categories.items')
                ->firstOrFail();

            $template->update([
                'name' => $name,
                'template_type' => $templateType,
            ]);

            BoqTemplateCategory::where('template_id', $template->id)->delete();

            $itemsCount = 0;
            foreach ($items as $sortOrder => $item) {
                if (empty($item['category_id'])) {
                    continue;
                }

                $templateCategory = BoqTemplateCategory::create([
                    'template_id'  => $template->id,
                    'category_id'  => $item['category_id'],
                    'sort_order'   => $sortOrder,
                ]);

                foreach ($item['category_items'] ?? [] as $subKey => $subItem) {
                    if (!$this->subItemHasContent($subItem)) {
                        continue;
                    }

                    BoqTemplateItem::create(
                        $this->buildTemplateItemPayload($templateCategory->id, $subItem, $request, $sortOrder, $subKey)
                    );
                    $itemsCount++;
                }
            }

            if ($itemsCount === 0) {
                throw new \RuntimeException('No BOQ items found to save as template.');
            }

            $template->update(['items_count' => $itemsCount]);

            return $template->fresh(['categories.items']);
        });
    }

    public function removeAppliedTemplateFromProjectBoq(int $boqId, int $userId, string $source = 'qs'): void
    {
        DB::transaction(function () use ($boqId, $userId, $source) {
            $applied = QSBoqAppliedTemplate::where('boq_id', $boqId)
                ->where('qs_id', $userId)
                ->first();

            if (!$applied) {
                return;
            }

            if ($source === 'architect') {
                $existingMainIds = BoqMainItem::where('boq_id', $boqId)->pluck('id');
                if ($existingMainIds->isNotEmpty()) {
                    BoqSubItem::whereIn('main_item_id', $existingMainIds)->delete();
                }
                BoqMainItem::where('boq_id', $boqId)->delete();
            } else {
                $existingMainIds = QSBoqMainItem::where('boq_id', $boqId)
                    ->where('qs_id', $userId)
                    ->pluck('id');

                if ($existingMainIds->isNotEmpty()) {
                    QSBoqSubItem::whereIn('main_item_id', $existingMainIds)->delete();
                }
                QSBoqMainItem::where('boq_id', $boqId)->where('qs_id', $userId)->delete();
            }

            $applied->delete();
        });
    }
}
