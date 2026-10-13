<?php

namespace App\Actions\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Models\Ecommerce\ProductEnquiry;
use App\Mail\Admin\ProductEnquiryToAdmin;
use Lorisleiva\Actions\Concerns\AsAction;

class SaveProductEnquiry
{
  use AsAction;

  public function rules(): array
  {
    return [
      'name' => ['required', 'max:100', 'string'],
      'email' => ['email:rfc,dns', 'required', 'max:100'],
      'contact_phone' => ['required', 'numeric', 'digits_between:5,15'],
      'subject' => ['required', 'string', 'max:100'],
      'message' => ['required', 'string', 'max:500'],
      'product_id' => ['required',  'numeric', 'exists:App\Models\Ecommerce\Product,id'],
    ];
  }

  public function handle(Request $request): RedirectResponse
  {
    $enquiry = ProductEnquiry::create($request->only(['name', 'email', 'subject', 'message', 'product_id']) + ['phone' => $request->contact_phone]);
    Mail::to(config('myconfig.CUSTOMER_CARE_EMAIL'))->send(new ProductEnquiryToAdmin(['enquiry' => $enquiry]));
    return redirect()->back()->with('success', 'Your query for the product has been submitted!');
  }
}
