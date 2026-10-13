<?php
namespace App\Http\Controllers\Customer\Buyer\QS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\BOQ\BoqQuotation;
use App\Models\BOQ\BoqMainItem;
use App\Models\BOQ\BoqSubItem;
use App\Models\Buyer\Buyer;
use App\Models\BOQ\BoqMappedWithContractorType;
use App\Http\Requests\Customer\BOQ\BOQRequest;
use App\Repositories\Customer\BOQRepository;
use App\Repositories\Customer\Buyer\BuyerAuthRepository;

class QuantitySurveyorController extends Controller
{
    
    public function __construct(private BuyerAuthRepository $buyerAuthRepository)
    {
        
    }
    
    
    public function index(){
        $user = Auth::guard('buyer')->user();
        $quantitySurveyors = Buyer::where('parent_id',$user->id)->orderByDesc('id')->get();
        return view('customer.buyer.qs.index',compact('quantitySurveyors'));
    }
    
    public function show($boq_id){
        $user = Auth::guard('buyer')->user();
        $project = BoqQuotation::find($boq_id);
        return view('customer.buyer.boq.architect.show',compact('project'));
    }
    
    public function create(){
        return view('customer.buyer.qs.create');
    }
  
  
    public function store(Request $request){
        try {
            
            // $boq = $this->buyerAuthRepository->register($request);
            $buyer = Buyer::create($request->only('first_name', 'last_name','parent_id','email','phonecode' ,'phone', 'dob', 'newsletter', 'password','account_type','company_name','registration_no','vat_no',
                                            'telephone_code','telephone_no','address','company_email'));
            return redirect(route('buyer.quantity-surveyor.index'))->with('sweet-msg','QS has been saved successfully.');
            // return $this->successResponse($buyer,"QS has been saved successfully.");
        } catch (\Throwable $e) {
            return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
        }
    }
    
    
    
    public function edit(Request $request){
        $boq = BoqQuotation::find($request->boq_id);
        return view('customer.buyer.boq.architect.create',compact('boq'));
    }
    
    public function createRevisedProject(Request $request){
        $boq = BoqQuotation::find($request->boq_id);
        return view('customer.buyer.boq.architect.create-revised-project',compact('boq'));
    }
    
    
    public function saveIndividualCategoryGroup(Request $request){
        try {
            $boq = $this->BOQRepository->saveIndividualCategoryGroup($request);
            return $this->successResponse([],"Porject has been saved successfully."); 
        
        } catch (\Throwable $e) {
            return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
        }
    }
  
    // public function save(BOQRequest $request)
    // {
    //     try {
    //         // dd($request->all()); // Debug: dumps all request data and stops execution
    //         $user = Auth::guard('buyer')->user();
    //         $request->merge(['architect_id' => $user->id]);
    //         // Handle file upload if present
    //         if ($request->hasfile('attachment_one')) {
    //             $request->request->add([
    //                 'attachment_file_one' => $this->handleSingleFileUpload($request->attachment_one, 'uploads/rfq/')
    //             ]);
    //         }
            
    //         if ($request->hasfile('attachment_two')) {
    //             $request->request->add([
    //                 'attachment_file_two' => $this->handleSingleFileUpload($request->attachment_two, 'uploads/rfq/')
    //             ]);
    //         }
            
    //         if ($request->hasfile('attachment_three')) {
    //             $request->request->add([
    //                 'attachment_file_three' => $this->handleSingleFileUpload($request->attachment_three, 'uploads/rfq/')
    //             ]);
    //         }
            
    //         if ($request->hasfile('attachment_four')) {
    //             $request->request->add([
    //                 'attachment_file_four' => $this->handleSingleFileUpload($request->attachment_four, 'uploads/rfq/')
    //             ]);
    //         }
            
    //         if($request->is_form_filled == 1){
    //             $request->merge(['status' => 'On Going']);
    //         }
            
    //         if(!empty($request->boq_id)){
    //           $boq =  BoqQuotation::where('id',$request->boq_id)->first();
    //           $boq->update($request->only('architect_id','project_name','client_name','boq_type','project_address','project_city','project_area','boq_deadline','validity_date','attachment_file_one','attachment_file_two','attachment_file_three','attachment_file_four','is_form_filled','status'));
    //         }else{
    //           $boq =  BoqQuotation::create($request->only('architect_id','project_name','client_name','boq_type','project_address','project_city','project_area','boq_deadline','validity_date','attachment_file_one','attachment_file_two','attachment_file_three','attachment_file_four','is_form_filled','status'));
    //         }
            
    //         if(is_array($request->items)){
    //             $this->saveBoqItems($request);
    //         }
            
    //         if(is_array($request->contractor_type)){
    //             $this->mapContractorTypeToBoq($request,$boq->id);
    //         }
            
            
    //         return $this->successResponse($boq,"Porject has been saved successfully.");
            
    //     } catch (\Throwable $e) {
    //         return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
    //     }
    // }
    
    // public function mapContractorTypeToBoq($request,$boqID){
        
    //     if (!empty($request->contractor_type)) :
    //         $contractor_types = is_array($request->contractor_type) ? $request->contractor_type: explode(',',$request->contractor_type);
    //         if(is_array($contractor_types)) :
    //             BoqMappedWithContractorType::where('boq_id',$boqID)->delete();
    //           foreach ($contractor_types as $value) {
    //             if (isset($value)) {
    //               $data[] = [ 
    //                 'boq_id' => $boqID,
    //                 'contractor_type' => $value
    //               ];
    //             }
    //           }
    //           BoqMappedWithContractorType::insert($data);
    //       endif;
    //     endif;
    // }
    
    // public function saveBoqItems($request){
    //     // return true;
    //     $subItems = [];
    //     if(count($request->items) > 0){
    //         $firstItem = collect($request->items)->first();
    //         // dd($firstItem,$firstItem['category_id']);
    //         if(!empty($firstItem['category_id'])){
            
    //             BoqMainItem::where('boq_id', $request->boq_id)->delete();
    //             BoqSubItem::where('boq_id', $request->boq_id)->delete();
    //             foreach ($request->items as $item) {
    //                 $mainItem = BoqMainItem::create(['boq_id' => $request->boq_id,'category_id' => $item['category_id']]);
                
    //                 if (!empty($item['category_items'])) {
    //                     foreach ($item['category_items'] as $sub_item) {
    //                         $singleItem = [
    //                             "boq_id" => $request->boq_id,
    //                             "main_item_id" => $mainItem->id,
    //                             "sub_category" => $sub_item['sub_category'],
    //                             "sub_sub_category" => $sub_item['sub_sub_category'] ?? null,
    //                             "description" => $sub_item['description'],
    //                             "unit" => $sub_item['unit'],
    //                             "quantity" => $sub_item['quantity'],
    //                             "rate" => $sub_item['rate'],
    //                             "amount" => $sub_item['amount'],
    //                             "reference_file" => null, 
    //                         ];
                
    //                         // Only add 'attachment_file' if an attachment is available
    //                         if (!empty($sub_item['attachment'])) {
    //                             $reference_file = $this->handleSingleFileUpload($sub_item['attachment'], 'uploads/rfq/');
    //                             $singleItem['reference_file'] = $reference_file;
    //                         }
                
    //                         $subItems[] = $singleItem;
    //                     }
    //                 }
    //             }
    
    //             // dd($subItems);
    //             BoqSubItem::insert($subItems);
    //         }
    //     }
    //     return true;
    // }
    
    // public function edit(Request $request){
    //     $boq = BoqQuotation::find($request->boq_id);
        
    //     return view('customer.buyer.boq.architect.create',compact('boq'));
    // }
    
    // public function saveIndividualCategoryGroup(Request $request){
    //     try {
            
    //         $subItems = []; 
    //         if(count($request->items) > 0){
    //             $firstItem = collect($request->items)->first();
    //             // dd($firstItem['category_id']);
    //             if(!empty($firstItem['category_id'])){
    //                 // return dd('ff',$firstItem->category_id,$request->items[0]['category_id']);
    //                 $mainItem = BoqMainItem::where('boq_id', $request->boq_id)->where('category_id',$firstItem['category_id'])->first();
    //                 if(!empty($mainItem)){
    //                     // dd($mainItem);
    //                     BoqSubItem::where('main_item_id', $mainItem->id)->delete();
    //                     $mainItem->delete();
    //                 }
                    
    //                 foreach ($request->items as $item) {
    //                     $mainItem = BoqMainItem::create(['boq_id' => $request->boq_id,'category_id' => $item['category_id']]);
                    
    //                     if (!empty($item['category_items'])) {
    //                         foreach ($item['category_items'] as $sub_item) {
    //                             $singleItem = [
    //                                 "boq_id" => $request->boq_id,
    //                                 "main_item_id" => $mainItem->id,
    //                                 "sub_category" => $sub_item['sub_category'],
    //                                 "sub_sub_category" => $sub_item['sub_sub_category'] ?? null,
    //                                 "description" => $sub_item['description'],
    //                                 "unit" => $sub_item['unit'],
    //                                 "quantity" => $sub_item['quantity'],
    //                                 "rate" => $sub_item['rate'],
    //                                 "amount" => $sub_item['amount'],
    //                                 "reference_file" => null, 
    //                             ];
                    
    //                             // Only add 'attachment_file' if an attachment is available
    //                             if (!empty($sub_item['attachment'])) {
    //                                 $reference_file = $this->handleSingleFileUpload($sub_item['attachment'], 'uploads/rfq/');
    //                                 $singleItem['reference_file'] = $reference_file;
    //                             }
                    
    //                             $subItems[] = $singleItem;
    //                         }
    //                     }
    //                 }
    
    //                 // dd($subItems);
    //                 BoqSubItem::insert($subItems);
                   
                   
    //             }
    //         }
    //         return $this->successResponse([],"Porject has been saved successfully."); 
        
    //     } catch (\Throwable $e) {
    //         return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
    //     }
    // }
    

    
}











