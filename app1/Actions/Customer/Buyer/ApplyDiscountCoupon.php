<?php

namespace App\Actions\Customer\Buyer;

use Exception;
use App\Models\Buyer\Cart;
use App\Models\Buyer\Order;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Coupon;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\TransactionHistory;

class ApplyDiscountCoupon
{
  use AsAction, ApiResponser;
 
  
  public function handle(Request $request)
  {
    try {
        $user = auth()->guard('buyer')->user();
        $message = "Coupon not found!";
      // check if the coupon exists.
      if (Coupon::where('code', '=', $request->code)->doesntExist())
        throw new Exception('Coupon not found!');

      $coupon = Coupon::where('code', '=', $request->code)->first();

      // check if the coupon is expired.
      if (now()->gt($coupon->date_till))
        throw new Exception('Coupon expired!');

      // if uses is 1
    //   if ($coupon->is_one_time_use === 1 && TransactionHistory::where([['user_id', '=', $request->code],['coupon_code', '=', $request->code]])->exists())
    //     throw new Exception('This coupon has already been used');

      // if uses is 0 
      // check if the coupon is already used by the customer
      if ($coupon->is_one_time_use == 1 && TransactionHistory::where([['user_id', '=', auth()->user()->id], ['coupon_code', '=', $request->code]])->exists())
        throw new Exception('This coupon has already been used.');

        
       if($coupon->coupon_type == "Add Duration In Subscriptions"){
           $message = "Hurray! You got {$coupon->duration} " . ($coupon->duration == 1 ? 'month' : 'months') . " of additional access.";
       }
       
       if($coupon->coupon_type == "Discount"){
           $platformFee = getPlatformFee('Platform Fee');
           if($platformFee > 0){
               $message = "Hurray! You got an additional discount of " . number_format($platformFee * ($coupon->percent / 100), 2) .".";
           }
       }
     
      return $this->successResponse(compact('message'), 'Discount Coupon applied successfully');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage(), 500);
    }
  }

//   public function handle(Request $request)
//   {
//     try {
//       // check if the coupon exists.
//       if (Coupon::where('code', '=', $request->code)->doesntExist())
//         throw new Exception('Coupon not found!');

//       $coupon = Coupon::where('code', '=', $request->code)->first();

//       // check if the coupon is expired.
//       if (now()->gt($coupon->date_till))
//         throw new Exception('Coupon expired!');

//       // if uses is 1
//       if ($coupon->uses === 1 && Order::where([['coupon_code', '=', $request->code]])->exists())
//         throw new Exception('This coupon has already been used');

//       // if uses is 0 
//       // check if the coupon is already used by the customer
//       if ($coupon->uses === 0 && Order::where([['user_id', '=', auth()->user()->id], ['coupon_code', '=', $request->code]])->exists())
//         throw new Exception('This coupon has already been used.');

//       if ($coupon->code === 'IVORY15' && auth()->user()->membership_type !== 'Ivory Tier')
//         throw new Exception('This coupon is only applicable for Ivory Tier members.');

//       if ($coupon->code === 'SILVER5' && auth()->user()->membership_type !== 'Silver Tier')
//         throw new Exception('This coupon is only applicable for Silver Tier members.');

//       if ($coupon->code === 'CLUBEXCLUSIVE10' && auth()->user()->membership_type !== 'Club Exclusive Tier')
//         throw new Exception('This coupon is only applicable for Club Exclusive Tier members.');

//       $products = collect([]);

//       if ($coupon->code !== 'FIRST10') {
//         // this block of code will work for all coupon codes except FIRST10.
//         if ($coupon->all_products)
//           $products = Cart::where([['coupon_used', '=', FALSE], ['cart_id', '=', session('cart_id')]])
//             ->whereNotIn('brand_id', [57, 301, 328])
//             ->get();
//         else
//           $products = Cart::whereIn('product_id', $coupon->products)
//             ->where([['coupon_used', '=', FALSE], ['cart_id', '=', session('cart_id')]])
//             ->whereNotIn('brand_id', [57, 301, 328])
//             ->get();
//       } else {
//         if (Order::where('user_id', '=', auth()->user()->id)->exists())
//           throw new Exception('Coupon code is invalid!');
//         // this block of code will work for only FIRST10 coupon code.
//         $products = Cart::where([['coupon_used', '=', FALSE], ['cart_id', '=', session('cart_id')]])
//           ->whereNotIn('brand_id', [57, 301, 328])
//           ->get();
//       }

//       $couponAmount = 0;
//       $couponCode = '';
//       $couponPercent = 0;

//       foreach ($products as $key => $product) {
//         $currentCouponAmount = ($product->price_unit * $coupon->percent) / 100; // Get coupon amount for the current iterating product
//         $couponAmount += $currentCouponAmount * $product->quantity;
//         $couponCode = $coupon->code;
//         $couponPercent = $coupon->percent;

//         $product->coupon_used = TRUE;
//         $product->coupon_amount = $currentCouponAmount;
//         $product->coupon_code = $coupon->code;
//         $product->coupon_percent = $coupon->percent;
//         $product->save();
//       }

//       return $this->successResponse(compact('couponAmount', 'couponCode', 'couponPercent'), 'Discount Coupon applied successfully');
//     } catch (\Throwable $th) {
//       return $this->errorResponse([], $th->getMessage(), 500);
//     }
//   }
}
