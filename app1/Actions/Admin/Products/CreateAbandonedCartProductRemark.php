<?php

namespace App\Actions\Admin\Products;

use Illuminate\Http\Request;
use App\Models\Buyer\CartRemark;
use Illuminate\Http\RedirectResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateAbandonedCartProductRemark
{
  use AsAction;

  public function handle(Request $request): RedirectResponse
  {
    CartRemark::create($request->only(['product_cart_id', 'remark', 'type']));
    return back()->with('success', 'Remark Added');
  }
}
