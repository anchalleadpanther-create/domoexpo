<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Repositories\Buyer\CartRepository;

class CheckForEmptyCart
{
  private $cartRepository;

  public function __construct(CartRepository $cartRepository)
  {
    $this->cartRepository = $cartRepository;
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
    if ($this->cartRepository->getCartData(session()->get('cart_id'))->count() === 0) {
      return redirect()->route('buyer.cart')->withErrors('Your cart is empty! Please add some products to your cart.');
    }
    return $next($request);
  }
}
