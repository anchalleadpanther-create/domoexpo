<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Buyer\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class ProductOrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(string $type, int $status)
  {
    $orders = Cart::orderByDesc('id')
      ->where([['order_status', '=', 1], ['status', '=', $status], ['seller_id', '=', Auth::guard('vendor')->user()->id]]);

    if (isset(request()->search))
      $orders = $orders->whereHas('orderItemDetail', function (Builder $query) {
        $query->where('shipping_name', 'like', '%' . request()->search . '%')
          ->orWhere('order_id_counter', 'like', '%' . request()->search . '%')
          ->orWhere('shipping_email', 'like', '%' . request()->search . '%')
          ->orWhere('shipping_phone', 'like', '%' . request()->search . '%');
      });

    $orders = $orders->paginate(50);

    $newOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 0]])->count();
    $acceptedOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 1]])->count();
    $packedOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 2]])->count();
    $readyToShipOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 3]])->count();
    $shippedOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 4]])->count();
    $deliveredOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 5]])->count();
    $cancelledOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 6]])->count();
    $returnedOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 7]])->count();
    $pendingOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 8]])->count();

    return view('vendors.orders.index', compact('orders', 'newOrdersCount', 'acceptedOrdersCount', 'packedOrdersCount', 'readyToShipOrdersCount', 'shippedOrdersCount', 'deliveredOrdersCount', 'cancelledOrdersCount', 'returnedOrdersCount', 'pendingOrdersCount'));
  }

  public function show(int $id)
  {
    $newOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 0]])->count();
    $acceptedOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 1]])->count();
    $packedOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 2]])->count();
    $readyToShipOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 3]])->count();
    $shippedOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 4]])->count();
    $deliveredOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 5]])->count();
    $cancelledOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 6]])->count();
    $returnedOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 7]])->count();
    $pendingOrdersCount = Cart::where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id], ['status', '=', 8]])->count();
    $order = Cart::orderByDesc('id')->where([['supplier_order_id', $id]])->first();
    $giftTotal = $order->gift_pricing * $order->quantity;

    return view('vendors.orders.show', compact('order', 'newOrdersCount', 'acceptedOrdersCount', 'packedOrdersCount', 'readyToShipOrdersCount', 'shippedOrdersCount', 'deliveredOrdersCount', 'cancelledOrdersCount', 'returnedOrdersCount', 'pendingOrdersCount', 'giftTotal'));
  }

  public function showPO()
  {
    $orders = Cart::orderByDesc('id')
      ->where([['order_status', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id]])
      ->whereHas('orderItemDetail', function (Builder $query) {
        $query->where('po_document', '!=', null);
      })
      ->paginate(50);

    return view('vendors.orders.po-list', compact('orders'));
  }
}
