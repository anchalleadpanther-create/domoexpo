<?php

namespace App\Http\Controllers\Customer\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer\RequestForQuotation;
use App\Models\Supplier\SellerQuotation;
use App\Models\Supplier\SellerQuotationProduct;

class ReceviedQuotationController extends Controller
{
    public function index(Request $request){
        dd(2);
        $rfq = RequestForQuotation::find($request->rfq_id);
        $acceptedSellerQuotation = $rfq->receivedSellerQuotationRequest()->where('status','accepted')->first();
                                        
        $receivedSellerQuotations = SellerQuotation::where('rfq_id',$request->rfq_id)->with(['quotationProducts'])->get();
        // dd($receivedSellerQuotations);
        return view('customer.buyer.recevied-quotation.index',compact('rfq','receivedSellerQuotations','acceptedSellerQuotation'));
    }
    
    public function rfq_pdf_detail(Request $request){
        
        $sellerQuote= SellerQuotation::where('id',$request->seller_quotation_id)->first();
        $rfq = RequestForQuotation::find($sellerQuote->rfq_id);
        $acceptedSellerQuotation = $rfq->receivedSellerQuotationRequest()->where('status','accepted')->first();
        return view('customer.buyer.recevied-quotation.pdf_html.detail',compact('rfq','sellerQuote','acceptedSellerQuotation'));                               
    }
    
    public function acceptParticularSellerQuotationByBuyer(Request $request)
    {
        // dd($request->all());
        
        // Reject other quotations related to the same RFQ
        // $receivedSellerQuotations = SellerQuotation::where('rfq_id', $request->rfq_id)
        //     ->where('id', '!=', $request->seller_quotation_id)
        //     ->update(['status' => 'Rejected']);
    
        // Get the accepted seller quotation
        $receivedSellerQuotation = SellerQuotation::find($request->seller_quotation_id);
    
        // Ensure the seller quotation exists
        if ($receivedSellerQuotation) {
            $receivedSellerQuotation->is_sent_to_architect = '1'; //
            $receivedSellerQuotation->architect_id = $receivedSellerQuotation->rfq->buyer_id ?? null; //
            $receivedSellerQuotation->save();
            
            foreach($request->product as $value){
              SellerQuotationProduct::where('id',$value['id'])->update(['contractor_price' => $value['contractor_price']]) ;
            }
            
            
            
            
        } else {
            return back()->with('error', 'Seller quotation not found.');
        }
    
        // Update the RFQ status to 'Accepted'
        // $rfq = RequestForQuotation::find($request->rfq_id);
        // if ($rfq) {
        //     $rfq->status = 'Accepted'; // Set RFQ status to 'Accepted'
        //     $rfq->save();
        // } else {
        //     return back()->with('error', 'Request for Quotation not found.');
        // }
    
        // Return success message
        return back()->with('success', ' Quotation has been sent to Architect Successfully.');
    }

}
