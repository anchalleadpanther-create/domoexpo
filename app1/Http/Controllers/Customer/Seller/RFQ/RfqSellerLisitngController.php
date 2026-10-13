<?php

namespace App\Http\Controllers\Customer\Seller\RFQ;

use App\Models\Buyer\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer\RequestForQuotation;

class RfqSellerLisitngController extends Controller
{
    
    public function index(Request $request){
       
        $user = Auth::guard('vendor')->user();
        $rfqs = RequestForQuotation::where('buyer_id',$user->id)->orderByDesc('id')->get();
        // dd($rfqs);
        return view('customer.seller.rfq.rfq-listing',compact('rfqs'));
    }
    
    public function changeRFQStatus(Request $request){
        $rfqs = RequestForQuotation::find($request->rfq_id);
        $rfqs->status = $request->status;
        $rfqs->save();
        return back();
    }
    
}