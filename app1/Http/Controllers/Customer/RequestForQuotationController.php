<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Customer\RFQRequest;
use App\Models\Customer\RequestForQuotation;
use App\Models\Customer\RfqMappedCategory;
use App\Models\Customer\RfqProduct;
use App\Models\Supplier\Supplier;
use App\Models\Customer\Address;

class RequestForQuotationController extends Controller
{

    public function rfq(){
        return view('purchasync.rfq');
    }

    public function saveRfq(Request $request)
    {
        // Debugging the request data (for development only)
        // return dd($request->all());
        
        $user = auth()->guard('buyer')->user();
        
        // Handle file upload if present
        if ($request->hasfile('upload_rfq_file')) {
            $request->request->add([
                'uploaded_rfq_file' => $this->handleSingleFileUpload($request->upload_rfq_file, 'uploads/upload_rfq_file/')
            ]);
        }
        $address = Address::where('id',$request->delivery_location)->first();
        
        // Add buyer_id to the request
        $request->request->add(['buyer_id' => $user->id]);
        $request->request->add(['name' => $user->first_name.' '.$user->last_name]);
        $request->request->add(['email' => $user->email]);
        $request->request->add(['mobile' => $user->phone]);
        
        $request->request->add(['buyer_address_id' => $address->id]);
        $request->request->add(['address_type' => $address->address_type]);
        $request->request->add(['address' => $address->address_one. ' ' .$address->address_two]);
        $request->request->add(['country' => $address->country]);
        $request->request->add(['state' => $address->state]);
        $request->request->add(['city' => $address->city]);
        $request->request->add(['post_code' => $address->post_code]);
        
        
        // Save the main RFQ data
        $save = RequestForQuotation::create($request->except('_token', 'upload_rfq_file', 'category', 'submit', 'product'));
        
        // Save categories using your existing method
        $this->mapRfqCategory($request, $save->id);
    
        // Save products in the RfqProduct table
        if ($request->has('product') && is_array($request->product)) {
            foreach ($request->product as $productData) {
                // Ensure all required fields are present
                if (!empty($productData['product_id']) && !empty($productData['brand_name']) && !empty($productData['uom'])) {
                    RfqProduct::create([
                        'rfq_id' => $save->id, // Link the product to the RFQ
                        'product_id' => $productData['product_id'],
                        'brand_name' => $productData['brand_name'],
                        'uom' => $productData['uom'],
                        'quantity' => $productData['quantity'],
                        'target_price' => $productData['target_price'],
                    ]);
                }
            }
        }
        
        return back()->with('success', "Request submitted successfully. Our team will contact you soon!");
    }

    
    
    public function mapRfqCategory($request,$rfqID){
        RfqMappedCategory::where('rfq_id', '=', $rfqID)->where('category_type',$request->quotation_type)->delete();
        if (is_array($request->category)) :
          foreach ($request->category as $value) {
            if (isset($value)) {
              $categoryData[] = [
                'rfq_id' => $rfqID,
                'category_type' => $request->quotation_type,
                'category_id' => $value,
              ];
            }
          }
          RfqMappedCategory::insert($categoryData);
        endif;
    }
}
