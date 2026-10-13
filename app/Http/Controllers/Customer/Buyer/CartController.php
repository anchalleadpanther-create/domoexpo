<?php

namespace App\Http\Controllers\Customer\Buyer;

use Illuminate\View\View;
use App\Models\Buyer\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Buyer\CartRepository;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\CartProductResource;
use Illuminate\Http\RedirectResponse;
use App\Models\Ecommerce\Product;

class CartController extends ApiController
{
  public function __construct(private CartRepository $CartRepository)
  {
  }

  public function addToCart(Request $request)
  {
    try {
      $response = $this->CartRepository->addToCart($request);
      if (!$response['status']) {
        return $this->errorResponse($response['cartData'], 'The quantity you are trying to add is exceeding the maximum stock value.', 202);
      }
      return $this->successResponse($response['cartData'], 'Product has been added to your cart.');
    } catch (\Throwable $th) {
      dd($th);
      dd($th->getMessage());
    }
  }

  public function removeFromCart(int $cartItemId)
  {
    try {
      Cart::find($cartItemId)->delete();
      return $this->successResponse([], 'Product has been removed from your cart.');
    } catch (\Throwable $th) {
      dd($th->getMessage());
    }
  }

  public function removeAllProductsFromCart()
  {
    try {
      Cart::where('cart_id', session()->get('cart_id'))->delete();
      return back()->withErrors('Cart has been emptied!');
    } catch (\Throwable $th) {
      dd($th->getMessage());
    }
  }

  public function getCartProducts(): JsonResponse
  {
    $cartProducts = CartProductResource::collection($this->CartRepository->getCartData(session()->get('cart_id')));
    $grandTotal = $this->CartRepository->getGrandTotal($cartProducts);
    $giftTotal = $this->CartRepository->getGiftTotal($cartProducts);

    $getCurrentCurrency = getCurrentCurrency();
    $shippingCharge = 0;

    if (Auth::guard('buyer')->check() && Auth::guard('buyer')->user()->OrdersCount === 0 && isset(Auth::guard('buyer')->user()->referred_by) && $grandTotal > 5000) {
      $grandTotal -= \App\Helpers\Referral::getDetails()->referralAmountToBeAlloted;
    }

    $cartId = session()->get('cart_id');
    $codAvailable = $grandTotal > \App\Helpers\Tiers::currentTier()->CODAvailableOnOrdersAbove;
    $codAvailabilityAmount = \App\Helpers\Tiers::currentTier()->CODAvailableOnOrdersAbove;

    if (getCurrentCurrency(request()->addressCountry)->currency === 'INR' && $grandTotal < \App\Helpers\Tiers::currentTier()->freeShipping) {
      $shippingCharge = getIndianShippingCost();

      if($grandTotal > 1000)
        $shippingCharge = 0;

    }

    if (getCurrentCurrency(request()->addressCountry)->currency !== 'INR' && $grandTotal < getInternationalShippingCircumstance()) {
      $shippingCharge = getInternationalShippingCost();

      if($grandTotal > 15000)
        $shippingCharge = 0;
    }

    $grandTotal += $shippingCharge;
    $walletAvailable = auth()
      ->guard('buyer')
      ->user()?->wallet;

      
    return $this->successResponse(compact('cartProducts', 'grandTotal', 'giftTotal', 'getCurrentCurrency', 'shippingCharge', 'cartId', 'codAvailable', 'codAvailabilityAmount', 'walletAvailable'));
  }



  public function viewCart()
  // : View
  {
    $cartProducts =     $this->CartRepository->getCartData(session()->get('cart_id'));
    $completeLookProductIds = [];
    $sortByPriceProducts = [];
    if(count($cartProducts) > 0){
       $cartProductIds = $cartProducts->pluck('product_id');
      $products = Product::whereIn('id', $cartProductIds)->get();
      $completeLookIds = $products->pluck('complete_look_ids')->toArray();
      
      foreach($completeLookIds as $completeLookId){
        $completeLookIdStrToArrays = explode(',',$completeLookId);
        foreach($completeLookIdStrToArrays as $completeLookIdStrToArray){
          if(!in_array($completeLookIdStrToArray,$completeLookProductIds)){
            if(!empty($completeLookIdStrToArray)){
              $completeLookProductIds[] = $completeLookIdStrToArray;
            }
          }
        }
      }
    }
        

    $trandingProducts = Product::where('status', 1)->orderByDesc('view_count')->take(15)->get();
    $sortByPriceProducts = Product::whereIn('id',$completeLookProductIds)->where('status', 1)->orderBy('price_unit', 'desc')->take(25)->get();


    return view('customer.product.cart-products',compact('trandingProducts','sortByPriceProducts'));
  }

  public function reduceQuantity(int $cartItemId)
  {
    try {
      $response = $this->CartRepository->reduceQuantity($cartItemId);
      if ($response['status']) {
        return $this->successResponse($response['cartData'], 'Product quantity has been reduced.');
      }
      return $this->errorResponse([], 'Product quantity cannot be reduced below 1.', 202);
    } catch (\Throwable $th) {
      dd($th->getMessage());
    }
  }

  public function increaseQuantity(int $cartItemId, int $maxStock)
  {
    try {
      $response = $this->CartRepository->increaseQuantity($cartItemId, $maxStock);
      if ($response['status']) {
        return $this->successResponse($response['cartData'], 'Product quantity has been increased.');
      }
      return $this->errorResponse([], 'Product quantity cannot be increased.', 202);
    } catch (\Throwable $th) {
      dd($th->getMessage());
    }
  }

  public function removeGifting(int $cartItemId): RedirectResponse
  {
    Cart::findOrFail($cartItemId)->update(['is_gift' => false, 'gift_pricing' => 0, 'gifting_message' => null]);
    return back()->with('success', 'Gifting has been removed');
  }
}
