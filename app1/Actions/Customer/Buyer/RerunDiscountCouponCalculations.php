<?php

namespace App\Actions\Customer\Buyer;

use App\Traits\ApiResponser;
use App\Models\Ecommerce\Coupon;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Database\Eloquent\Collection;

class RerunDiscountCouponCalculations
{
  use AsAction, ApiResponser;

  public function handle(Collection $products): bool
  {
    if ($products->isEmpty())
      return false;

    $coupon = Coupon::where('code', '=', $products[0]->coupon_code)->first();

    if ($coupon === null)
      return false;

    $couponAmount = 0;
    $couponCode = '';
    $couponPercent = 0;

    foreach ($products as $key => $product) {
      $currentCouponAmount = ($product->price_unit * $coupon->percent) / 100; // Get coupon amount for the current iterating product
      $couponAmount += $currentCouponAmount * $product->quantity;
      $couponCode = $coupon->code;
      $couponPercent = $coupon->percent;

      $product->coupon_used = TRUE;
      $product->coupon_amount = $currentCouponAmount;
      $product->coupon_code = $coupon->code;
      $product->coupon_percent = $coupon->percent;
      $product->save();
    }

    return true;
  }
}
