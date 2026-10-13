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


class BOQRepository extends BaseRepository
{
    public function saveBOQ($request)
    {
        try {
            
            $user = Auth::guard('buyer')->user();
            // dd($request->all(),$user); // Debug: dumps all request data and stops execution
            $request->merge(['created_by' => $user->account_type]);
            $request->merge(['created_by_user_id' => $user->id]);
            // Handle file upload if present
            if ($request->hasfile('attachment_one')) {
                $request->request->add([
                    'attachment_file_one' => $this->handleSingleFileUpload($request->attachment_one, 'uploads/rfq/')
                ]);
            }
            
            if ($request->hasfile('attachment_two')) {
                $request->request->add([
                    'attachment_file_two' => $this->handleSingleFileUpload($request->attachment_two, 'uploads/rfq/')
                ]);
            }
            
            if ($request->hasfile('attachment_three')) {
                $request->request->add([
                    'attachment_file_three' => $this->handleSingleFileUpload($request->attachment_three, 'uploads/rfq/')
                ]);
            }
            
            if ($request->hasfile('attachment_four')) {
                $request->request->add([
                    'attachment_file_four' => $this->handleSingleFileUpload($request->attachment_four, 'uploads/rfq/')
                ]);
            }
            
            
            if($request->want_to_revised == 1){
                $request->merge(['parent_id' => $request->boq_id]);
            }
            
            // Contractor Type,Direct Contractor,Quantity Surveyor
            // if(in_array($request->project_sent_to,['Contractor Type','Direct Contractor']) && count($request->quantity_surveyors) == 0){
            //     $request->merge(['status' => 'Sent to Contractor']);
            // }elseif(in_array($request->project_sent_to,['Quantity Surveyor'])){
            //     $request->merge(['status' => 'Sent to Quantity Surveyors']);
            // }
            
            if($request->is_form_filled_developer == 1){
                $request->merge(['status' => 'Sent To Architects']);
            }elseif(in_array($request->project_sent_to,['Contractor Type','Direct Contractor']) && !is_array($request->quantity_surveyors)){
                $request->merge(['status' => 'Sent to Contractor']);
            }elseif($request->is_form_filled == 1 && !is_array($request->quantity_surveyors)){
                $request->merge(['status' => 'Architect Start Wroking']);
            }elseif(is_array($request->quantity_surveyors)){
                 $request->merge(['status' => 'Sent to Quantity Surveyors']);
            }
            
            // dd($request->all(),!is_array($request->quantity_surveyors) ,count($request->quantity_surveyors));
            
            if(!empty($request->boq_id) &&  $request->want_to_revised != 1){
               $boq =  BoqQuotation::where('id',$request->boq_id)->first();
               $boq->update($request->only('project_name','client_name','developer_amount','boq_type','project_sent_to','project_need','project_address','project_city','project_area','boq_deadline','validity_date','attachment_file_one','attachment_file_two','attachment_file_three','attachment_file_four','is_form_filled','is_form_filled_developer','status'));
            }else{
                if($request->want_to_revised == 1){
                    $revisedTotalBoq = BoqQuotation::where('parent_id',$request->boq_id)->count();
                    $request->merge(['boq_id_counter' => "$request->boq_id-".($revisedTotalBoq + 1)]);
                }
               $boq =  BoqQuotation::create($request->only('created_by','created_by_user_id','parent_id','project_need','boq_id_counter','project_name','client_name','developer_amount','boq_type','project_sent_to','project_address','project_city','project_area','boq_deadline','validity_date','attachment_file_one','attachment_file_two','attachment_file_three','attachment_file_four','is_form_filled','is_form_filled_developer','status'));
            }
            
            if(is_array($request->items)){
                $this->saveBoqItems($request);
            }
            
            if(is_array($request->contractor_type) && $request->project_sent_to == 'Contractor Type'){
                $this->mapContractorTypeToBoq($request,$boq->id);
            }
            
            if(is_array($request->contractors) && $request->project_sent_to == 'Direct Contractor'){
                $this->mapContractorToBoq($request,$boq->id);
            }
            
            if(is_array($request->quantity_surveyors)){
                $this->mapBoqToQuantitySurveyor($request,$boq->id);
            }
            
            if(is_array($request->architects)){
                $this->mapArchitectToBoq($request,$boq->id);
            }
            
            // if(!empty($user->device_token) && $request->is_form_filled == 1){
            //   SendFirebaseNotification($user->device_token ?? '', "BOQ Created", "You have created BOQ  #$boq->id  Successfully!",$user->id, 'Buyer');
            // }
             
            
            return $boq;
            
        } catch (\Throwable $e) {
            dd('Line No. ' . $e->getLine() . ' - ' . $e->getMessage());
            return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
        }
    }
    
    
    public function mapBoqToQuantitySurveyor($request,$boqID){
        
        if (!empty($request->quantity_surveyors)) :
            $quantity_surveyors = is_array($request->quantity_surveyors) ? $request->quantity_surveyors: explode(',',$request->quantity_surveyors);
            if(is_array($quantity_surveyors)) :
                BoqSentToByQuantitySurveyor::where('boq_id',$boqID)->delete();
              foreach ($quantity_surveyors as $value) {
                if (isset($value)) {
                  $data[] = [ 
                    'boq_id' => $boqID,
                    'quantity_surveyor_id' => $value
                  ];
                }
                
                // if(isset($request->is_form_filled) && $request->is_form_filled == 1){
                //     $user = Buyer::find($value); // Single optimized query
                //     if ($user) {
                //         // Check if token exists and is not empty
                //             $result = SendFirebaseNotification($user->device_token ?? '',"BOQ Assigned", "You have assigned a BOQ #$boqID !",$user->id, 'Buyer');
                //     }
                // }
                
              }
              BoqSentToByQuantitySurveyor::insert($data);
          endif;
        endif;
    }
    
    public function mapArchitectToBoq($request,$boqID){
        if (!empty($request->architects)) :
            $architects = is_array($request->architects) ? $request->architects: explode(',',$request->architects);
            if(is_array($architects)) :
                BoqMappedWithArchitect::where('boq_id',$boqID)->delete();
              foreach ($architects as $value) {
                if (isset($value)) {
                  $data[] = [ 
                    'boq_id' => $boqID,
                    'architect_id' => $value
                  ];
                }
                
                // if(isset($request->is_form_filled) && $request->is_form_filled == 1){
                //     $user = Buyer::find($value); // Single optimized query
                //     if ($user) {
                //         // Check if token exists and is not empty
                //         $result = SendFirebaseNotification($user->device_token ?? '',"BOQ Assigned", "You have assigned a BOQ #$boqID !",$user->id, 'Buyer');
                //     }
                // }
              }
              BoqMappedWithArchitect::insert($data);
          endif;
        endif;
    }
    
    
    public function mapContractorToBoq($request,$boqID){
        
        if (!empty($request->contractors)) :
            $contractors = is_array($request->contractors) ? $request->contractors: explode(',',$request->contractors);
            if(is_array($contractors)) :
                BoqMappedWithContractor::where('boq_id',$boqID)->delete();
              foreach ($contractors as $value) {
                if (isset($value)) {
                  $data[] = [ 
                    'boq_id' => $boqID,
                    'contractor_id' => $value
                  ];
                }
                
                
                // if(isset($request->is_form_filled) && $request->is_form_filled == 1){
                //     $user = Buyer::find($value); // Single optimized query
                //     if ($user) {
                //         $result = SendFirebaseNotification($user->device_token ?? '',"BOQ Assigned", "You have assigned a BOQ #$boqID !",$user->id, 'Buyer');
                //     }
                // }
              }
              BoqMappedWithContractor::insert($data);
          endif;
        endif;
    }
    
    public function mapContractorTypeToBoq($request,$boqID){
        
        if (!empty($request->contractor_type)) :
            $contractor_types = is_array($request->contractor_type) ? $request->contractor_type: explode(',',$request->contractor_type);
            if(is_array($contractor_types)) :
                BoqMappedWithContractorType::where('boq_id',$boqID)->delete();
              foreach ($contractor_types as $value) {
                if (isset($value)) {
                  $data[] = [ 
                    'boq_id' => $boqID,
                    'contractor_type' => $value
                  ];
                }
                 
              }
              
            //   if(isset($request->is_form_filled) && $request->is_form_filled == 1){
                    $users = Buyer::whereJsonContains('contractor_type',$contractor_types)->get();
                    // dd($users);
                    // foreach($users as $user){
                    //     if ($user) {
                    //         $result = SendFirebaseNotification($user->device_token ?? '',"BOQ Assigned", "$user->id You have assigned a BOQ #$boqID !",$user->id, 'Buyer');
                    //     }
                    // }
                // }
              
              BoqMappedWithContractorType::insert($data);
          endif;
        endif;
    }
    
    public function saveBoqItems($request){
        // return true;
        $subItems = [];
        if(count($request->items) > 0){
            $firstItem = collect($request->items)->first();
            // dd($firstItem,$firstItem['category_id']);
            if(!empty($firstItem['category_id'])){
            
                BoqMainItem::where('boq_id', $request->boq_id)->delete();
                BoqSubItem::where('boq_id', $request->boq_id)->delete();
                foreach ($request->items as $item) {
                    $mainItem = BoqMainItem::create(['boq_id' => $request->boq_id,'category_id' => $item['category_id']]);
                
                    if (!empty($item['category_items'])) {
                        foreach ($item['category_items'] as $sub_item) {
                            $singleItem = [
                                "boq_id" => $request->boq_id,
                                "main_item_id" => $mainItem->id,
                                "sub_category" => $sub_item['sub_category'],
                                "sub_sub_category" => $sub_item['sub_sub_category'] ?? null,
                                "description" => $sub_item['description'],
                                "unit" => $sub_item['unit'],
                                "quantity" => $sub_item['quantity'],
                                "rate" => $sub_item['rate'],
                                "amount" => $sub_item['amount'],
                                "reference_file" => null, 
                            ];
                
                            // Only add 'attachment_file' if an attachment is available
                            if (!empty($sub_item['attachment'])) {
                                $reference_file = $this->handleSingleFileUpload($sub_item['attachment'], 'uploads/rfq/');
                                $singleItem['reference_file'] = $reference_file;
                            }
                
                            $subItems[] = $singleItem;
                        }
                    }
                }
    
                // dd($subItems);
                BoqSubItem::insert($subItems);
            }
        }
        return true;
    }
    
    
    
    
    public function saveQSBoqItems($request){
        // return true;
        $qs = auth()->user();
        $subItems = [];
        if(count($request->items) > 0){
            $firstItem = collect($request->items)->first();
            // dd($firstItem,$firstItem['category_id']);
            if(!empty($firstItem['category_id'])){
            
                QSBoqMainItem::where('boq_id', $request->boq_id)->delete();
                QSBoqSubItem::where('boq_id', $request->boq_id)->delete();
                foreach ($request->items as $item) {
                    $mainItem = QSBoqMainItem::create(['qs_id' => $qs->id,'boq_id' => $request->boq_id,'category_id' => $item['category_id']]);
                
                    if (!empty($item['category_items'])) {
                        foreach ($item['category_items'] as $sub_item) {
                            $singleItem = [
                                "boq_id" => $request->boq_id,
                                "main_item_id" => $mainItem->id,
                                "sub_category" => $sub_item['sub_category'],
                                "sub_sub_category" => $sub_item['sub_sub_category'] ?? null,
                                "description" => $sub_item['description'],
                                "unit" => $sub_item['unit'],
                                "quantity" => $sub_item['quantity'],
                                "rate" => $sub_item['rate'],
                                "amount" => $sub_item['amount'],
                                "reference_file" => null, 
                            ];
                
                            // Only add 'attachment_file' if an attachment is available
                            if (!empty($sub_item['attachment'])) {
                                $reference_file = $this->handleSingleFileUpload($sub_item['attachment'], 'uploads/rfq/');
                                $singleItem['reference_file'] = $reference_file;
                            }
                
                            $subItems[] = $singleItem;
                        }
                    }
                }
    
                // dd($subItems);
                QSBoqSubItem::insert($subItems);
            }
        }
        return true;
    }
    
    public function saveIndividualCategoryGroup($request){
        try {
            
            $subItems = []; 
            if(count($request->items) > 0){
                $firstItem = collect($request->items)->first();
                // dd($firstItem['category_id']);
                if(!empty($firstItem['category_id'])){
                    // return dd('ff',$firstItem->category_id,$request->items[0]['category_id']);
                    $mainItem = BoqMainItem::where('boq_id', $request->boq_id)->where('category_id',$firstItem['category_id'])->first();
                    if(!empty($mainItem)){
                        // dd($mainItem);
                        BoqSubItem::where('main_item_id', $mainItem->id)->delete();
                        $mainItem->delete();
                    }
                    
                    foreach ($request->items as $item) {
                        $mainItem = BoqMainItem::create(['boq_id' => $request->boq_id,'category_id' => $item['category_id']]);
                    
                        if (!empty($item['category_items'])) {
                            foreach ($item['category_items'] as $sub_item) {
                                $singleItem = [
                                    "boq_id" => $request->boq_id,
                                    "main_item_id" => $mainItem->id,
                                    "sub_category" => $sub_item['sub_category'],
                                    "sub_sub_category" => $sub_item['sub_sub_category'] ?? null,
                                    "description" => $sub_item['description'],
                                    "unit" => $sub_item['unit'],
                                    "quantity" => $sub_item['quantity'],
                                    "rate" => $sub_item['rate'],
                                    "amount" => $sub_item['amount'],
                                    "reference_file" => null, 
                                ];
                    
                                // Only add 'attachment_file' if an attachment is available
                                if (!empty($sub_item['attachment'])) {
                                    $reference_file = $this->handleSingleFileUpload($sub_item['attachment'], 'uploads/rfq/');
                                    $singleItem['reference_file'] = $reference_file;
                                }
                    
                                $subItems[] = $singleItem;
                            }
                        }
                    }
    
                    // dd($subItems);
                    BoqSubItem::insert($subItems);
                   
                }
            }
            return true;
        
        } catch (\Throwable $e) {
            dd('Line No. ' . $e->getLine() . ' - ' . $e->getMessage());
            return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
        }
    }
    
    
    // public function changeQSBOQStatus($qsId,$boqId,$request){
    //     try{
    //         $user = auth()->user();
            
    //         $mappedBoq = BoqSentToByQuantitySurveyor::where('quantity_surveyor_id',$qsId)->where('boq_id',$boqId)->first();
    //         $mappedBoq->status              = $request->status;
    //         $mappedBoq->status_changed_by   = $user->account_type;
    //         $mappedBoq->amount              = !empty($request->amount) && $request->amount != 0 ? $request->amount : $mappedBoq->amount;
    //         $mappedBoq->transaction_date    = !empty($request->transaction_date) ? $request->transaction_date : $mappedBoq->transaction_date;
    //         $mappedBoq->transaction_id      = !empty($request->transaction_id)  ? $request->transaction_id : $mappedBoq->transaction_id;
    //         $mappedBoq->save();
    //         return true;
    //     } catch (\Throwable $e) {
    //         dd('Line No. ' . $e->getLine() . ' - ' . $e->getMessage());
    //         return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
    //     }
        
      
    // }
    
    
     public function changeQSBOQStatus($request){
        try{
            $user = auth()->user();
            // dd($request->all());
            $mappedBoq = BoqSentToByQuantitySurveyor::where('quantity_surveyor_id',$request->qs_id)->where('boq_id',$request->boq_id)->first();
            $mappedBoq->status              = $request->status ?? $mappedBoq->status;
            $mappedBoq->status_changed_by   = $user->account_type;
            $mappedBoq->amount              = !empty($request->amount) && $request->amount != 0 ? $request->amount : $mappedBoq->amount;
            $mappedBoq->transaction_date    = !empty($request->transaction_date) ? $request->transaction_date : $mappedBoq->transaction_date;
            $mappedBoq->transaction_id      = !empty($request->transaction_id)  ? $request->transaction_id : $mappedBoq->transaction_id;
            $mappedBoq->save();
            if($request->status == 'Payment Done'){
                BoqQuotation::where('id',$request->boq_id)->update(['status' => 'Assign To Contractor']);
            }
            return true;
        } catch (\Throwable $e) {
            dd('Line No. ' . $e->getLine() . ' - ' . $e->getMessage());
            return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
        }
    }
    
    
    
    
     public function changeArchitectBOQStatus($request){
        try{
            $user = auth()->user();
            // dd($request->all());
            $mappedBoq = BoqMappedWithArchitect::where('architect_id',$request->architect_id)->where('boq_id',$request->boq_id)->first();
            $mappedBoq->status              = $request->status ?? $mappedBoq->status;
            $mappedBoq->status_changed_by   = $user->account_type;
            $mappedBoq->amount              = !empty($request->amount) && $request->amount != 0 ? $request->amount : $mappedBoq->amount;
            $mappedBoq->transaction_date    = !empty($request->transaction_date) ? $request->transaction_date : $mappedBoq->transaction_date;
            $mappedBoq->transaction_id      = !empty($request->transaction_id)  ? $request->transaction_id : $mappedBoq->transaction_id;
            $mappedBoq->save();
            if($request->status == 'Payment Done'){
                BoqQuotation::where('id',$request->boq_id)->update(['status' => 'Assign To Architect']);
            }
            
            $boqID = $request->boq_id;
            
            $user = Buyer::find($user->id); // Single optimized query

            // if ($user) {
            //     $result = SendFirebaseNotification($user->device_token ?? '',"BOQ status", "BOQ  #$boqID status has been changed successfully!",$user->id, 'Buyer');
            // }
            
            $user = Buyer::where('id',$request->architect_id)->first();
            // if ($user) {
            //     // Check if token exists and is not empty
            //         $result = SendFirebaseNotification($user->device_token ?? '',"BOQ status", "BOQ  #$boqID status has been changed successfully!",$user->id, 'Buyer');
            // }
            
            return true;
        } catch (\Throwable $e) {
            dd('Line No. ' . $e->getLine() . ' - ' . $e->getMessage());
            return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
        }
    }
    
    
    public function getPurposeArchitectsByDeveloper($boqId){
       try{ 
          $mappedBoq = BoqMappedWithArchitect::where('boq_id',$boqId)->with('architect')->get();
          return $mappedBoq;
       } catch (\Throwable $e) {
            dd('Line No. ' . $e->getLine() . ' - ' . $e->getMessage());
            return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
      }
    }
    
    public function getProposeQsByArchitect($boqId){
       try{ 
        //   dd($boqId);
          $mappedBoq = BoqSentToByQuantitySurveyor::where('boq_id',$boqId)->with('qs')->get();
          return $mappedBoq;
       } catch (\Throwable $e) {
            dd('Line No. ' . $e->getLine() . ' - ' . $e->getMessage());
            return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
      }
    }
    
    
    
   
    
    
    
    
    
}
