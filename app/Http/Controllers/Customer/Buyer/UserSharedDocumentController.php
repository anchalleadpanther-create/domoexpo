<?php

namespace App\Http\Controllers\Customer\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersSharedDocument;
use App\Models\BOQ\BoqQuotation;
use App\Models\BOQ\BoqMappedSupplier;
use App\Models\BOQ\BoqMappedSupplierSubItemRate;
use App\Models\Buyer\Buyer;
use App\Models\Supplier\Supplier;
use Illuminate\Support\Facades\Auth;

class UserSharedDocumentController extends Controller
{
    public function index(Request $request)
    {
        $user = $this->resolveAuthenticatedUser();
        $accountType = $this->resolveAccountType($user);

        $documents = UsersSharedDocument::query()
            ->where(function ($q) use ($user, $accountType) {
                $q->where('sender_id', $user->id)->where('sender_type', $accountType);
            })
            ->orWhere(function ($q) use ($user, $accountType) {
                $q->where('receiver_id', $user->id)->where('receiver_type', $accountType);
            });

        if (!empty($request->boq_id)) {
            $documents = $documents->where('boq_id', $request->boq_id);
        }

        $documents = $documents->orderByDesc('id')->get();
        $boq = !empty($request->boq_id) ? BoqQuotation::find($request->boq_id) : null;

        $view = $this->isSupplierUser($user)
            ? 'vendors.sharedDocument.index'
            : 'customer.buyer.sharedDocument.index';

        return view($view, compact('documents', 'boq'));
    }

    public function supplierBoqProjects()
    {
        $supplier = Auth::guard('vendor')->user();

        $rateRows = BoqMappedSupplierSubItemRate::query()
            ->where('supplier_id', $supplier->id)
            ->whereNotNull('boq_id')
            ->whereNotNull('contractor_id')
            ->orderByDesc('id')
            ->get();

        $mappedFromBoq = BoqMappedSupplier::query()
            ->where('supplier_id', $supplier->id)
            ->whereNotNull('boq_id')
            ->whereNotNull('contractor_id')
            ->orderByDesc('id')
            ->get();

        $projectRows = collect();

        foreach ($rateRows as $row) {
            $projectRows->push([
                'boq_id' => $row->boq_id,
                'contractor_id' => $row->contractor_id,
            ]);
        }

        foreach ($mappedFromBoq as $row) {
            $projectRows->push([
                'boq_id' => $row->boq_id,
                'contractor_id' => $row->contractor_id,
            ]);
        }

        $projectRows = $projectRows
            ->unique(fn ($row) => $row['boq_id'] . '-' . $row['contractor_id'])
            ->values()
            ->map(function ($row) {
                $row['boq'] = BoqQuotation::find($row['boq_id']);
                $row['contractor'] = Buyer::find($row['contractor_id']);
                return $row;
            })
            ->filter(fn ($row) => $row['boq'] && $row['contractor']);

        return view('vendors.sharedDocument.boq-projects', [
            'projectRows' => $projectRows,
        ]);
    }

    public function sendDocument(Request $request)
    {
        try {
            $user = $this->resolveAuthenticatedUser();
            $accountType = $this->resolveAccountType($user);

            $request->validate(['document_file' => 'required']);

            if ($request->hasFile('document_file')) {
                $request->request->add([
                    'document' => $this->handleSingleFileUpload($request->document_file, 'uploads/document_file/'),
                ]);
            }

            UsersSharedDocument::create([
                'boq_id' => $request->boq_id,
                'sender_type' => $accountType,
                'sender_id' => $user->id,
                'receiver_id' => $request->receiver_id,
                'receiver_type' => $request->receiver_type,
                'document' => $request->document,
            ]);

            return back()->with('success', 'Document has been saved.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    protected function resolveAuthenticatedUser()
    {
        if (Auth::guard('buyer')->check()) {
            return Auth::guard('buyer')->user();
        }

        if (Auth::guard('vendor')->check()) {
            return Auth::guard('vendor')->user();
        }

        abort(403);
    }

    protected function resolveAccountType($user): string
    {
        return $this->isSupplierUser($user) ? 'Supplier' : $user->account_type;
    }

    protected function isSupplierUser($user): bool
    {
        return $user instanceof Supplier;
    }
}
