<?php

namespace App\Http\Controllers\Customer\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer\RequestForQuotation;
use App\Models\Supplier\SellerQuotation;
use App\Models\Supplier\SellerQuotationProduct;

class ReceviedQuotationFromContractorController extends Controller
{
    public function index(Request $request){
         $architect = auth()->user();
        $rfq = RequestForQuotation::find($request->rfq_id);
        $acceptedSellerQuotation = $rfq->receivedSellerQuotationRequest()->where('status','accepted')->first();
                                        
         $receivedQuotationFromContractor = SellerQuotation::where('rfq_id',$request->rfq_id)->where('architect_id',$architect->id)->with(['quotationProducts'])->get();
        
        return view('customer.buyer.recevied-quotation-from-contractor.index',compact('rfq','receivedQuotationFromContractor','acceptedSellerQuotation'));
    }
    
    public function rfq_pdf_detail(Request $request){
        
        $sellerQuote= SellerQuotation::where('id',$request->seller_quotation_id)->first();
        $rfq = RequestForQuotation::find($sellerQuote->rfq_id);
        $acceptedSellerQuotation = $rfq->receivedSellerQuotationRequest()->where('status','accepted')->first();
        return view('customer.buyer.recevied-quotation.pdf_html.detail',compact('rfq','sellerQuote','acceptedSellerQuotation'));                               
    }
    
    public function acceptParticularContracotorQuotationByArchitector(Request $request)
    {
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
