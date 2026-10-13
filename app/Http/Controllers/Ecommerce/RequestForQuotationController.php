<?php
namespace App\Http\Controllers\Ecommerce;

use App\Models\Buyer\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer\RequestForQuotation;
use App\Models\Supplier\SellerQuotation;

class RequestForQuotationController extends Controller
{
    
  
    
    public function index(Request $request){
       
        $user = Auth::guard('vendor')->user();
        $rfqs = RequestForQuotation::paginate(20);
        
        return view('ecommerce.rfq.rfq-listing',compact('rfqs'));
    }
    
    
    public function requestedSellerQuotation(Request $request){
        $rfq = RequestForQuotation::find($request->rfq_id);
        $acceptedSellerQuotation = $rfq->receivedSellerQuotationRequest()->where('status','accepted')->first();
                                        
        $receivedSellerQuotations = SellerQuotation::where('rfq_id',$request->rfq_id)->with(['quotationProducts'])->get();
        // dd($receivedSellerQuotations);
        return view('ecommerce.rfq.seller-quotations',compact('rfq','receivedSellerQuotations','acceptedSellerQuotation'));
    }
    
    public function changeRFQStatus(Request $request){
        $rfqs = RequestForQuotation::find($request->rfq_id);
        $rfqs->status = $request->status;
        $rfqs->save();
        return back();
    }
    
}