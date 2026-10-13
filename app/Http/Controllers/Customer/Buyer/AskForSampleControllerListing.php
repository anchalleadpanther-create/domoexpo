<?php

namespace App\Http\Controllers\Customer\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer\ProductWishlist;
use App\Models\Customer\DesignerWishlist;
use App\Models\AskForSample;
use App\Models\Ecommerce\Product;

class AskForSampleControllerListing extends Controller
{
    public function index(Request $request){
        $user = auth()->guard('buyer')->user();
        $askForSamples = AskForSample::where('buyer_id',$user->id)->orderBydesc('id')->paginate(20);
       
        return view('customer.buyer.ask-for-sample.index',compact('askForSamples'));
    }
    
    public function acceptParticularSellerQuotationByBuyer(Request $request)
    {
        // Remove dd() once you are done debugging
        // dd($request->all());
    
        // Reject other quotations related to the same RFQ
        $receivedSellerQuotations = SellerQuotation::where('rfq_id', $request->rfq_id)
            ->where('id', '!=', $request->seller_quotation_id)
            ->update(['status' => 'Rejected']);
    
        // Get the accepted seller quotation
        $receivedSellerQuotation = SellerQuotation::find($request->seller_quotation_id);
    
        // Ensure the seller quotation exists
        if ($receivedSellerQuotation) {
            $receivedSellerQuotation->status = 'Accepted'; // Set status to 'Accepted'
            $receivedSellerQuotation->save();
        } else {
            return back()->with('error', 'Seller quotation not found.');
        }
    
        // Update the RFQ status to 'Accepted'
        $rfq = RequestForQuotation::find($request->rfq_id);
        if ($rfq) {
            $rfq->status = 'Accepted'; // Set RFQ status to 'Accepted'
            $rfq->save();
        } else {
            return back()->with('error', 'Request for Quotation not found.');
        }
    
        // Return success message
        return back()->with('success', 'Request Quotation has been accepted.');
    }

}
