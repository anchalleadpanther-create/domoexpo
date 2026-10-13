<?php

namespace App\Http\Controllers\Customer\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersSharedDocument;
use App\Models\BOQ\BoqQuotation;

class UserSharedDocumentController extends Controller
{
    // public function index(Request $request){
    //     $user  = auth()->guard('buyer')->user();
    //     $rfqEnquiries = RFQEnquiry::where('receiver_type',$user->account_type)->where('receiver_id',$user->id)->orderByDesc('id')->get();
    //     return view('customer.buyer.rfq-enquiries',compact('rfqEnquiries'));
    // }
    
    
    
    public function index(Request $request)
    {
        $user = auth()->user();
        // /home/domoexpo/public_html/resources/views/customer/buyer/sharedDocument/index.blade.php
        $documents = UsersSharedDocument::query()->where(function ($q) use($user){
            $q->where('sender_id',$user->id)->where('sender_type',$user->account_type);
        })->orWhere(function($q) use($user){
            $q->where('receiver_id',$user->id)->where('receiver_type',$user->account_type);
        });
        
        if(!empty($request->boq_id)){
            $documents = $documents->where('boq_id',$request->boq_id);
        }
        
        $documents = $documents->orderByDesc('id')->get();
        
        $boq = BoqQuotation::where('id',$request->boq_id)->first();
        $contractors  = $boq->project_sent_to == "Direct Contractor" ? $boq->mappedContractor : $boq->mappedContractorType;
        
        
        // dd($contractors);
        
        return view('customer.buyer.sharedDocument.index',compact('documents','boq'));
        
    }
    
    
    
    public function sendDocument(Request $request){
        try{
            //  dd($request->all());
            
            $request->validate(['document_file' => 'required']);
            
             if ($request->hasfile('document_file'))
                $request->request->add(['document' => $this->handleSingleFileUpload($request->document_file, 'uploads/document_file/')]);

            UsersSharedDocument::create([
                "boq_id"        => $request->boq_id,
                "sender_type"   => $request->sender_type,
                "sender_id"     => $request->sender_id,
                "receiver_id"   => $request->receiver_id,
                "receiver_type" => $request->receiver_type,
                "document"      => $request->document,
            ]);
            
            return back()->with('success',"Document has been saved.");
        }catch(\Throwable $th){
            return back()->with('success',$th->getMessage());
        }
        
    }
    
}
