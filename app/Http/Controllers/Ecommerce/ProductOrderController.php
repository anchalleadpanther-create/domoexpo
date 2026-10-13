<?php

namespace App\Http\Controllers\Ecommerce;

use App\Models\Buyer\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Ecommerce\ProductOrder;
use Illuminate\Database\Eloquent\Builder;
use App\Actions\Admin\Orders\ChangeProductOrderStatusViaAdmin;

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
      ->where([['order_status', '=', 1], ['status', '=', $status]]);

    if (isset(request()->search))
      $orders = $orders->whereHas('orderItemDetail', function (Builder $query) {
        $query->where('shipping_name', 'like', '%' . request()->search . '%')
          ->orWhere('order_id_counter', 'like', '%' . request()->search . '%')
          ->orWhere('shipping_email', 'like', '%' . request()->search . '%')
          ->orWhere('shipping_phone', 'like', '%' . request()->search . '%');
      });

    $orders = $orders->paginate(20);

    $newOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 0]])->count();
    $acceptedOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 1]])->count();
    $packedOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 2]])->count();
    $readyToShipOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 3]])->count();
    $shippedOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 4]])->count();
    $deliveredOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 5]])->count();
    $cancelledOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 6]])->count();
    $returnedOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 7]])->count();
    $pendingOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 8]])->count();

    return view('ecommerce.orders.index', compact('orders', 'newOrdersCount', 'acceptedOrdersCount', 'packedOrdersCount', 'readyToShipOrdersCount', 'shippedOrdersCount', 'deliveredOrdersCount', 'cancelledOrdersCount', 'returnedOrdersCount', 'pendingOrdersCount'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Ecommerce\ProductOrder  $productOrder
   * @return \Illuminate\Http\Response
   */
  // public function show(ProductOrder $productOrder)
  public function show(int $id)
  {
    
    $newOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 0]])->count();
    $acceptedOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 1]])->count();
    $packedOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 2]])->count();
    $readyToShipOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 3]])->count();
    $shippedOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 4]])->count();
    $deliveredOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 5]])->count();
    $cancelledOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 6]])->count();
    $returnedOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 7]])->count();
    $pendingOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 8]])->count();
    $order = Cart::orderByDesc('id')->where([['supplier_order_id', $id]])->first();
    $giftTotal = $order->gift_pricing * $order->quantity;

    $states = getStates($order->orderItemDetail->country->id);
    $cities = getCities(@$order->orderItemDetail->state->id);
    return view('ecommerce.orders.show', compact('order','states','cities', 'newOrdersCount', 'acceptedOrdersCount', 'packedOrdersCount', 'readyToShipOrdersCount', 'shippedOrdersCount', 'deliveredOrdersCount', 'cancelledOrdersCount', 'returnedOrdersCount', 'pendingOrdersCount', 'giftTotal'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Ecommerce\ProductOrder  $productOrder
   * @return \Illuminate\Http\Response
   */
  public function edit(ProductOrder $productOrder)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Ecommerce\ProductOrder  $productOrder
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, ProductOrder $productOrder)
  {
    //
  }

  public function changeProductOrderStatus(int $id, int $status)
  {
    ChangeProductOrderStatusViaAdmin::make()->handle($id, $status, Auth::user()->name, 'Admin');
    return back()->with('success', 'Order Status has been updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ecommerce\ProductOrder  $productOrder
   * @return \Illuminate\Http\Response
   */
  public function destroy(ProductOrder $productOrder)
  {
    //
  }
}
