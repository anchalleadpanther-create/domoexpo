<?php

namespace App\Actions\Customer\Buyer;

use App\Models\Buyer\Cart;
use Lorisleiva\Actions\Concerns\AsAction;

class RemoveDiscountCoupon
{
  use AsAction;

  public function asController()
  {
    Cart::where([['order_status', '=', 0], ['buyer_id', '=', auth()->user()->id]])
      ->update([
        'coupon_used' => FALSE,
        'coupon_amount' => 0,
        'coupon_code' => NULL,
        'coupon_percent' => 0,
      ]);

    return back()->with('success', 'Discount coupon removed successfully');
  }
}
