<?php

namespace App\Http\Controllers\Customer\Seller;

use Illuminate\View\View;
use App\Models\Buyer\Cart;
use App\Models\Buyer\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Buyer\OrderRepository;
use App\Actions\ProductOrder\ChangeProductOrderStatus;


class ProductOrderController extends Controller
{

  protected $OrderRepository;

  public function __construct(OrderRepository $OrderRepository)
  {
    $this->OrderRepository = $OrderRepository;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(string $type, int $status): View
  {
    $orders = Cart::orderByDesc('id')
      ->where([['seller_id', supplierId(Auth::guard('buyer')->user()->id)], ['order_status', '=', 1], ['status', '=', $status]])
      ->get();
    return view('customer.sellers.product-orders', compact('orders'));
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
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function show(int $id)
  {
    $order = Cart::orderByDesc('id')
      ->where([['supplier_order_id', $id]])
      ->first();
    return view('customer.sellers.product-order-detail', compact('order'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function edit(Order $order)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Order $order)
  {
    //
  }

  public function changeProductOrderStatus(int $id, int $status)
  {
    ChangeProductOrderStatus::run($id, $status, supplierDetails()->ar_name, 'Supplier');
    return back()->with('sweet-alert', 'Order Status has been updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function destroy(Order $order)
  {
    //
  }
}
