<?php

namespace App\Actions\Customer;

use Illuminate\Http\RedirectResponse;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Repositories\Buyer\CartRepository;
use App\Models\Ecommerce\CustomTailoredProductEnquiry;
use App\Http\Requests\Customer\CustomTailoredQueryRequest;

class SaveProductCustomTailoredEnquiry
{
  use AsAction;

  public function handle(CustomTailoredQueryRequest $request, CartRepository $cartRepository): RedirectResponse
  {
    try {
      CustomTailoredProductEnquiry::create($request->validated());
      $response = $cartRepository->addToCart($request);
      if (!$response['status'])
        return redirect()->back()->withErrors('The quantity you are trying to add is exceeding the maximum stock value.');

      return redirect()->route('buyer.checkout')->with('success', 'Your custom tailored enquiry for the product has been submitted!');
    } catch (\Throwable $th) {
      return redirect()->back()->withErrors($th->getMessage())->withInput($request->validated());
    }
  }
}
