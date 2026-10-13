<?php

namespace App\Http\Controllers\Ecommerce;

use Exception;
use Illuminate\View\View;
use App\Models\Buyer\Cart;
use App\Models\Buyer\Buyer;
use App\Models\Buyer\Order;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Coupon;
use App\Models\Ecommerce\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Repositories\Buyer\OrderRepository;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SelfOrderController extends Controller
{
  use ApiResponser;

  public function __construct(public OrderRepository $orderRepository)
  {
  }

  public function getInitialOrderInfo(int $customerId): View
  {
    try {
      $customer = Buyer::findOrFail($customerId);
      return view('ecommerce.self-order.initial-order-info', compact('customer'));
    } catch (\Throwable $th) {
      dd($th);
    }
  }

  public function getProductViaSku(string $sku)
  {
    try {
      $product = Product::where([['sku', '=', $sku], ['status', '=', 1]])->with(['brand', 'productTypeValueOne'])->firstOrFail();
      $productSizes = Product::where('sku', '=', $sku)->select('id', 'sku', 'type_value_id_2', 'stock', 'price_unit')->with(['productTypeValueTwo'])->get();
      return $this->successResponse(compact('product', 'productSizes'), 'Product has been fetched');
    } catch (ModelNotFoundException $th) {
      return $this->errorResponse([], 'No product found for the given sku!');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }

  public function checkCoupon(string $code, int $buyerId): JsonResponse
  {
    try {
      // check if the coupon exists.
      if (Coupon::where('code', '=', $code)->doesntExist())
        throw new Exception('Coupon not found!');

      $coupon = Coupon::where('code', '=', $code)->first();

      // check if the coupon is expired.
      if (now()->gt($coupon->date_till))
        throw new Exception('Coupon expired!');

      // if uses is 1
      if ($coupon->uses === 1 && Order::where([['coupon_code', '=', $code]])->exists())
        throw new Exception('This coupon has already been used');

      // if uses is 0 
      // check if the coupon is already used.
      if ($coupon->uses === 0 && Order::where([['user_id', '=', $buyerId], ['coupon_code', '=', $code]])->exists())
        throw new Exception('This coupon has already been used.');

      if ($coupon->code === 'FIRST10' && Order::where('user_id', '=', $buyerId)->exists())
        throw new Exception('Coupon code is invalid!');

      return $this->successResponse([], 'Coupon is valid.');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }

  public function placeOrder(Request $request)
  {
    try {
      $this->orderRepository->newOrderViaAdmin($request);
      return back()->with('success', 'Order has been placed successfully!');
    } catch (\Throwable $th) {
      dd($th);
    }
  }
}
