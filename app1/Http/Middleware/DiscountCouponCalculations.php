<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Repositories\Buyer\CartRepository;
use App\Actions\Customer\Buyer\RerunDiscountCouponCalculations;

class DiscountCouponCalculations
{
  public function __construct(private CartRepository $cartRepository)
  {
  }

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next)
  {
    RerunDiscountCouponCalculations::run($this->cartRepository->getCartData(session()->get('cart_id')));
    return $next($request);
  }
}
