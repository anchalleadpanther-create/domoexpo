<?php

namespace App\Http\Controllers\Customer\Buyer;

use Illuminate\View\View;
use App\Models\Customer\Address;
use App\Models\Ecommerce\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Buyer\CartRepository;

class CheckoutController extends Controller
{
  public function __construct(private CartRepository $CartRepository)
  {
  }

  public function checkout(): View
  {

    $addresses = collect([]);
    $isReferralDiscountAvailable = false;
    $selectedAddress = null;

    if (Auth::guard('buyer')->check()) {
      $addresses = Address::where('user_id', '=', Auth::guard('buyer')->user()->id)->orderByDesc('id')->get();
      $isReferralDiscountAvailable = (Auth::guard('buyer')->user()->OrdersCount === 0 && isset(Auth::guard('buyer')->user()->referred_by)) ?  true : false;
      if (isset(request()->address))
        $selectedAddress = Address::where([['id', '=', request()->address], ['user_id', '=', Auth::guard('buyer')->user()->id]])->first();
      else
        $selectedAddress = $addresses->first();
    }

    $couponStartName = 'FEI15';
    $couponsArray = [];

    for ($i = 001; $i <= 200; $i++)
      $couponsArray[] = $couponStartName . str_pad($i, 3, '0', STR_PAD_LEFT);

    $coupons = Coupon::latest()->where([['status', '=', 1], ['promo_coupon', '=', 0]])
      ->whereNotIn('code', $couponsArray)
      ->whereDate('date_till', '>=', now()->toDateString())
      ->whereDate('date_from', '<=', now()->toDateString())
      ->get();

    $currentCurrency = getCurrentCurrency($selectedAddress?->country);

    return view('customer.order.checkout', compact('addresses', 'isReferralDiscountAvailable', 'coupons', 'currentCurrency'));
  }
}
