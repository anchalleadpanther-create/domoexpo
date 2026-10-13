<?php

namespace App\Actions\Customer\Buyer;

use App\Models\Buyer\Cart;
use App\Models\Customer\ProductWishlist;
use App\Traits\ApiResponser;
use Illuminate\Http\RedirectResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class MoveToWishlist
{
  use AsAction, ApiResponser;

  public function handle(int $buyerId, int $cartId): RedirectResponse
  {
    try {
      $cartProduct = Cart::where([['buyer_id', '=', $buyerId], ['cart_id', '=', $cartId]])->first();

      if (ProductWishlist::where([['user_id', '=', $cartProduct->buyer_id], ['product_id', '=', $cartProduct->product_id]])->doesntExist())
        ProductWishlist::create(['user_id' => $buyerId, 'product_id' => $cartProduct->product_id]);

      $cartProduct->delete();

      return back()->with('success', 'Product has been successfully moved to your wishlist.');
    } catch (\Throwable $th) {
      dd($th);
    }
  }
}
