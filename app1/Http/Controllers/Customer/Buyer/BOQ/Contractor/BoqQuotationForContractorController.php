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
use App\Models\BOQ\BoqMappedSupplier;

use App\Models\BOQ\BoqMappedSupplierSubItemRate;

use App\Models\Supplier\Supplier;

use App\Models\BOQ\BoqAcceptationByContractor;  
use Illuminate\Support\Facades\DB;

  


class BoqQuotationForContractorController extends Controller
{
    use FileUpload;

  
    public function index(){
        $user = Auth::guard('buyer')->user();
        // dd($user->contractor_type);
        
        $query = BoqQuotation::query()
                ->where(function ($q) use ($user) {
                    $q->whereHas('mappedContractorType', function ($subQuery) use ($user) {
                        $subQuery->whereIn('contractor_type', (array) $user->contractor_type);
                    })
                    ->orWhereHas('mappedContractor', function ($subQuery) use ($user) {
                        $subQuery->whereIn('contractor_id', [(int) $user->id]);
                    });
                })->where('is_form_filled',1);

        
        $totalProjects = $query->count();
        
        $projects = (clone $query)->orderByDesc('id')->paginate(10);


        // $projects = BoqQuotation::whereHas('mappedContractorType',function($q) use $user {
        //     $q->whereIn('contractor_type',$user->contractor_type)
        //     })->orderByDesc('id')->get();
        return view('customer.buyer.boq.contractor.index',compact('projects','totalProjects'));
    }
    
    public function show($boq_id){
        $user = Auth::guard('buyer')->user();
        $project = BoqQuotation::find($boq_id);
        $suppliers = Supplier::where('status',1)->get();
        return view('customer.buyer.boq.contractor.show',compact('project','suppliers'));
    }
    
    public function boqMappedToSupplier(Request $request){
        
        return true;
    }
    
    public function acceptBoq(Request $request){
        // dd($request->all());
        $user = Auth::guard('buyer')->user();
        $project = BoqQuotation::find($request->boq_id);
        $is_accepted = strtolower($request->status) == 'accepted' ? 1 : 0;
        if(BoqAcceptationByContractor::where(['boq_id'=>$request->boq_id,'contractor_id' => $user->id])->exists()){
          $accepted =  BoqAcceptationByContractor::where(['boq_id'=>$request->boq_id,'contractor_id' => $user->id])->update(['status' => $request->status,'is_accepted' => $is_accepted]) ;
        }else{
          $accepted = BoqAcceptationByContractor::create(['boq_id'=>$request->boq_id,'contractor_id' => $user->id,'status' => $request->status,'is_accepted' => $is_accepted]);
        }
        
        if($accepted)
        return back()->with('success','You have accpted this project successfully.');
        
        return back()->with('success','Something wrong try after sometime!.');
        
    }
    
    
     public function sendToSupplier(Request $request)
    {
        
        // dd($request->all());
        $mappedSuppliers = [];
    
        if (isset($request->sendToAll) && $request->sendToAll == 'sendToAll') {
    
            $project = BoqQuotation::find($request->boq_id);
    
            foreach ($project->getBoqMainItem as $mainItem) {
    
                $suppliers = Supplier::whereHas('mappedCategories', function ($q) use ($mainItem) {
                    $q->where('category_id', $mainItem->category_id);
                })->get();
    
                foreach ($suppliers as $supplier) {
    
                    $exists = BoqMappedSupplier::where('contractor_id', auth()->id())
                        ->where('supplier_id', $supplier->id)
                        ->where('boq_id', $mainItem->boq_id)
                        ->where('main_item_id', $mainItem->id)
                        ->exists();
    
                    if (!$exists) {
                        $mappedSuppliers[] = [
                            'contractor_id' => auth()->id(),
                            'supplier_id'   => $supplier->id,
                            'boq_id'        => $mainItem->boq_id,
                            'main_item_id'  => $mainItem->id,
                            'category_id'   => $mainItem->category_id,
                        ];
                    }
                    
                    
                    if ($supplier) {
                        // Check if token exists and is not empty
                        if (!empty($supplier->device_token)) {
                            $result = SendFirebaseNotification($supplier->device_token,"New BOQ Assigned","A new BOQ (ID: $mainItem->boq_id) has been assigned to you.",$supplier->id,'Supplier');
                        } 
                    }
                   
                }
            }
    
        } else {
    
            $mainItem = BoqMainItem::find($request->main_item_id);
            if(!empty($request->suppliers) && count($request->suppliers) > 0){
                foreach ($request->suppliers as $supplierId) {
                    
                    $supplier = Supplier::where('id', $supplierId)->first();
        
                    $exists = BoqMappedSupplier::where('contractor_id', auth()->id())
                        ->where('supplier_id', $supplierId)
                        ->where('boq_id', $mainItem->boq_id)
                        ->where('main_item_id', $mainItem->id)
                        ->exists();
        
                    if (!$exists) {
                        $mappedSuppliers[] = [
                            'contractor_id' => auth()->id(),
                            'supplier_id'   => $supplierId,
                            'boq_id'        => $mainItem->boq_id,
                            'main_item_id'  => $mainItem->id,
                            'category_id'   => $mainItem->category_id,
                        ];
                        
                        if ($supplier) {
                            // Check if token exists and is not empty
                            if (!empty($supplier->device_token)) {
                                $result = SendFirebaseNotification($supplier->device_token,"New BOQ Assigned","A new BOQ (ID: $mainItem->boq_id) has been assigned to you.",$supplier->id,'Supplier');
                            } 
                        }
                    }
                    
                    
                }
            }
    
            
        }
    
        if (!empty($mappedSuppliers)) {
            BoqMappedSupplier::insert($mappedSuppliers);
        }
    
        return back()->with('success', 'You have sent to suppliers successfully.');
    }
    
    
    
    // public function sendToSupplier(Request $request){
    //     // dd($request->all());
    //     $mappedSupplier = [];
        
    //     if(isset($request->sendToAll) && $request->sendToAll == 'sendToAll'){
    //         $project = BoqQuotation::find($request->boq_id);
    //         foreach($project->getBoqMainItem as $mainKey => $mainItem) {
    //           $suppliers = Supplier::whereHas('mappedCategories', function ($q) use ($mainItem) {
    //                                                 $q->where('category_id', $mainItem->category_id);
    //                         })->get();  
            
    //           foreach($suppliers as $supplier){
    //             $mappedSuppliers[] = [
    //                     'contractor_id' => auth()->user()->id,
    //                     'supplier_id' => $supplier,
    //                     'boq_id' => $mainItem->boq_id,
    //                     'main_item_id' => $mainItem->id,
    //                     'category_id' => $mainItem->category_id,
    //                 ];
    //             } 
    //         }
    //     }else{
           
    //         $mainItem = BoqMainItem::find($request->main_item_id);
    //         foreach($request->suppliers as $supplier){
    //             $mappedSuppliers[] = [
    //                     'contractor_id' => auth()->user()->id,
    //                     'supplier_id' => $supplier,
    //                     'boq_id' => $mainItem->boq_id,
    //                     'main_item_id' => $mainItem->id,
    //                     'category_id' => $mainItem->category_id,
    //                 ];
    //         } 
    //     }
        
    //     BoqMappedSupplier::insert($mappedSuppliers);
    //     return back()->with('success','You have send to suppliers successfully.');
    // }
    
    
    
    
    public function addContractorMarkupToQuoteArchitect(Request $request)
    {
        $user = auth()->user();
        // dd($request->all());
    
        $request->validate([
            'supplier_rate_id' => 'required|exists:boq_mapped_supplier_sub_item_rates,id',
            'contractor_markup_type' => 'nullable|string',
            'added_contractor_markup' => 'nullable|numeric',
            'contractor_remark' => 'nullable|string',
        ]);
    
        // $supplier_rate = BoqMappedSupplierSubItemRate::findOrFail($request->supplier_rate_id);
        $supplier_rate = BoqMappedSupplierSubItemRate::where('id',$request->supplier_rate_id)->first();
    // dd($supplier_rate);
    
        $markup = (float) $request->input('added_contractor_markup', 0);
    
        DB::transaction(function () use ($supplier_rate, $user, $markup, $request) {
            // Set is_accepted_by_contractor = 0 for other rates of the same boq_sub_item
            BoqMappedSupplierSubItemRate::where('boq_sub_item_id', $supplier_rate->boq_sub_item_id)
                ->where('id', '!=', $supplier_rate->id)   // exclude the one we're about to accept
                ->update(['is_accepted_by_contractor' => 0]);
             
            $total_contractor_rate = 0;   
            if($request->contractor_markup_type == 'Percentage'){
                $markup_value = $supplier_rate->total_supplier_rate * ($request->added_contractor_markup /100);
                $total_contractor_rate = $supplier_rate->total_supplier_rate + $markup_value;
            }else{
                $total_contractor_rate = $request->total_supplier_rate + $supplier_rate->added_contractor_markup;
            }
 
            // Update the selected supplier rate
            $supplier_rate->contractor_id = $user->id;
            $supplier_rate->contractor_markup_type = $request->contractor_markup_type;
            $supplier_rate->contractor_mark_up = $request->added_contractor_markup;
            $supplier_rate->total_contractor_rate = $total_contractor_rate;
            $supplier_rate->contractor_remark = $request->input('contractor_remark');
            $supplier_rate->is_accepted_by_contractor = 1;
            $supplier_rate->save();
        });
    
        return back()->with('success', 'You have saved markup successfully.');
    }

    
    // public function addContractorMarkupToQuoteArchitect(Request $request)
    // {
    //     $user = auth()->user();
    //     // dd($request->all());
    //     // Validate the request data (optional but recommended)
    //     // $request->validate([
    //     //     'supplier_rate_id' => 'required|exists:boq_mapped_supplier_sub_item_rates,id',
    //     //     'added_contractor_markup' => 'nullable|numeric',
    //     //     'total_supplier_rate' => 'required|numeric',
    //     //     'contractor_remark' => 'nullable|string',
    //     // ]);
    
    //     // Fetch the selected supplier rate row
    //     $supplier_rate = BoqMappedSupplierSubItemRate::find($request->supplier_rate_id);
    
    //     // Reset is_accepted_by_contractor to 0 for all related records
    //     BoqMappedSupplierSubItemRate::where(['boq_sub_item_id'=> $supplier_rate->boq_sub_item_id],['contractor_id' =>$user->id])->update(['is_accepted_by_contractor' => 0]); // Fixed: update expects an array
    
    //     // Update the selected record
    //     $supplier_rate->contractor_id = $user->id;
    //     $supplier_rate->contractor_mark_up = $request->added_contractor_markup ?? 0;
    //     $supplier_rate->total_contractor_rate = $supplier_rate->total_supplier_rate + $request->added_contractor_markup;
    //     $supplier_rate->contractor_remark = $request->contractor_remark;
    //     $supplier_rate->is_accepted_by_contractor = 1;
    //     $supplier_rate->save();
    
    //     return back()->with('success', 'You have saved markup successfully.');
    // }
    
    

    
   

    
}












