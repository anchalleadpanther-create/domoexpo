<?php
namespace App\Http\Controllers\Customer\Buyer\BOQ\Contractor;

use App\Traits\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\BOQ\BoqQuotation;
use App\Models\BOQ\BoqMainItem;
use App\Models\BOQ\BoqSubItem;
use App\Http\Requests\Customer\BOQ\BOQRequest;
use App\Models\BOQ\BoqMappedWithContractorType;
use App\Models\Supplier\Supplier;
use App\Models\BOQ\BoqMappedSupplier;
use App\Models\BOQ\BoqMappedSupplierSubItemRate;

// /home/domoexpo/public_html/app/Http/Controllers/Customer/Buyer/BOQ/Contractor/SupplierQuotationOnBoqController.php

class SupplierQuotationOnBoqController extends Controller
{
    use FileUpload;

    public function index($boq_id){
        $user = Auth::guard('buyer')->user();
        $project = BoqQuotation::find($boq_id);
        $suppliers = Supplier::where('status',1)->get();

        $supplierIdsFromRates = BoqMappedSupplierSubItemRate::where('boq_id', $boq_id)
            ->where('contractor_id', $user->id)
            ->whereNotNull('supplier_id')
            ->pluck('supplier_id');

        $supplierIdsFromMapped = BoqMappedSupplier::where('boq_id', $boq_id)
            ->where('contractor_id', $user->id)
            ->whereNotNull('supplier_id')
            ->pluck('supplier_id');

        $mappedSuppliersForDocs = Supplier::where('status', 1)
            ->whereIn('id', $supplierIdsFromRates->merge($supplierIdsFromMapped)->unique())
            ->get();

        return view('customer.buyer.boq.contractor.supplier-quotations-on-boq', compact(
            'project',
            'suppliers',
            'mappedSuppliersForDocs'
        ));
    }
    
     public function saveContractorRate(Request $request)
    {
        dd($request->all());
        // Validate incoming request
        $request->validate([
            'boq_sub_item_id' => 'required|exists:boq_sub_items,id', // Ensure the ID exists in the database
            'total_contractor_rate' => 'required|numeric',
            'contractor_remark' => 'nullable|string|max:255',
        ]);
    
        // Get authenticated vendor
        $user = Auth::guard('buyer')->user();
        // Find the BoqSubItem
        $boq_sub_item = BoqSubItem::findOrFail($request->boq_sub_item_id);
    
        // Prepare data to insert
        $data = $boq_sub_item->toArray();
        
        // Exclude 'id', 'created_at', 'updated_at' manually, as `except` does not work directly on Eloquent models
        unset($data['id'], $data['created_at'], $data['updated_at']);
    
        // Add custom fields to the data
        $data = $data + [
            'contractor_id' => $user->id,
            'boq_sub_item_id' => $request->boq_sub_item_id,
            'total_contractor_rate' => $request->total_contractor_rate,
            'contractor_remark' => $request->contractor_remark,
            'is_accepted_by_contractor' => 1
        ];
    
        // Save or update the record
        BoqMappedSupplierSubItemRate::updateOrCreate(['contractor_id' => $user->id, 'boq_sub_item_id' => $request->boq_sub_item_id],$data);
        // Redirect back with a success message
        return back()->with('success', 'Supplier rates have been saved.');
    }
    
    
    
   

    
}












