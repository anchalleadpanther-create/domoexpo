<?php

namespace App\Actions\Marketplace;

use App\Models\Ecommerce\ProductEnquiry;
use App\Models\Buyer\Buyer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Ecommerce\Product;

use Lorisleiva\Actions\Concerns\AsAction;

class SaveProductEnquiry
{
  use AsAction;

  public function rules(): array
  {
    return [
      'first_name' => ['required', 'max:100', 'string'],
      'last_name' => ['required', 'max:100', 'string'],
      'email' => ['email:rfc,dns', 'required', 'max:200'],
      'phonecode' => ['sometimes', 'string', 'max:200'],
      'phone' => ['required', 'numeric', 'digits_between:5,15'],
      'quantity' => ['sometimes', 'string', 'max:200'],
    //   'unit' => ['required', 'string', 'max:200'],
    // //   'diameter' => ['required', 'string', 'max:200'],
    //   'types_of_requirement' => ['required', 'string', 'max:200'],
    //   'subject' => ['nullable', 'string', 'max:100'],
      'message' => ['required', 'string', 'max:500'],
      'product_id' => ['sometimes',  'numeric', 'exists:App\Models\Ecommerce\Product,id'],
    ];
  }

    public function handle(Request $request): RedirectResponse
    {
        
        // Ensure the user is not already authenticated
        if (!Auth::guard('buyer')->check()) {
            // Check if the buyer exists by email
            if (Buyer::where('email', $request->email)->exists()) {
                $buyer = Buyer::where('email', $request->email)->first();
                // Attempt to authenticate using the email
                if($buyer){
                    Auth::guard('buyer')->login($buyer);
                }
            } else {
                // If the buyer doesn't exist, create a new buyer with default password
                $newbuyer = Buyer::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'account_type' => "Buyer",
                    'password' => 123456,
                ]);
    
                // Authenticate the newly created buyer
                if ($newbuyer) {
                    $buyer = $newbuyer;
                    // Attempt to authenticate using the email
                    if($buyer){
                        Auth::guard('buyer')->login($buyer);
                    }
                }
            }
        }
    
        $product = Product::find($request->product_id);
        $request->merge(['supplier_id' => $product->seller_id]);
        // Ensure that the product enquiry data is properly sanitized and validated before insertion
        ProductEnquiry::create($request->only([
            'first_name','last_name', 'email', 'phonecode', 'quantity', 'message','supplier_id', 'product_id'
        ]) + ['phone' => $request->phone,'buyer_id' => Auth::guard('buyer')->user()->id]);
    
        // Redirect with a success message
        return back()->with('success', 'Your query for the product has been submitted!');
        // return redirect()->route('buyer.dashboard',['buyerProductInquiry'])->with('success', 'Your query for the product has been submitted!');
    }

}
