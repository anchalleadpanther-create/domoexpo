<?php

namespace App\Http\Controllers\Customer\Buyer;

use App\Traits\Wallet;
use Illuminate\View\View;
use App\Models\Buyer\Cart;
use App\Models\Buyer\Buyer;
use App\Models\Buyer\Order;
use Illuminate\Http\Request;
use App\Traits\PaymentGateway;
use App\Http\Controllers\Controller;
use App\Traits\WhatsappNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier\SupplierOrder;
use App\Repositories\Buyer\CartRepository;
use App\Repositories\Buyer\OrderRepository;
use App\Actions\Customer\OrderEmailNotification;
use App\Actions\Customer\OrderWhatsappNotification;
use App\Actions\ProductOrder\ChangeProductOrderStatus;
use App\Actions\Customer\AddReferralBonusAmountToWalletOfReferrer;
use App\Actions\ProductOrder\DivideAndAllocateWalletAndGiftCardAmount;

class ProductOrderController extends Controller
{
  use PaymentGateway, WhatsappNotification;

  public function __construct(private OrderRepository $orderRepository, private  CartRepository $cartRepository)
  {
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(string $type, int $status): View
  {
    $orders = Cart::orderByDesc('id')
      ->where([['buyer_id', Auth::guard('buyer')->user()->id], ['order_status', '=', 1], ['status', '=', $status]])
      ->get();
    return view('customer.buyers.product-orders', compact('orders'));
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
    try {
      $request->validate(['address' => 'required|exists:App\Models\Customer\Address,id']);
      
      if ($request->payment_method === 'PayPal') {
        $response = $this->orderRepository->newOrderViaPaypal($request);
        return $this->paypal($response['order']);
      } elseif ($request->payment_method === 'RazorPay' || $request->payment_method === 'Cash on Delivery') {

        $order = $this->orderRepository->newOrder($request);
        return redirect()->route('buyer.order-successful', $order->id)->with('sweet-alert', 'Order Successfully Placed');
      }
    } catch (\Throwable $th) {
      dd($th);
    }
  }

  public function orderSuccessful(int $orderId): View
  {
    $order = Order::find($orderId);
    // getting order data
    $cartProducts = $this->cartRepository->getCartData($order->cart_id);
    $giftTotal = $this->cartRepository->getGiftTotal($cartProducts);

    if ($order->status != 8)
      return view('customer.order.order-successful', compact('order', 'giftTotal'));


    // copying just created order into sellers order table
    $this->orderRepository->mapOrderToSuppliersOrderTable($order, $cartProducts);

    // emptying user wallet if used and make an entry in wallet history
    (!isset($order->wallet_used)) ?: $this->orderWalletUpdate($order->buyer, $order->id);

    if ($order->status === 8)
      $this->orderRepository->updateStatus($orderId, 0);

    // changing cart items status to order placed
    $this->cartRepository->changeCartItemsStatus($order->cart_id, 1);

    ChangeProductOrderStatus::run($order->cart_id, 0, $order->buyer->fullName, 'Buyer');
    // sending order email to buyer after successful order
    OrderEmailNotification::run($order, $order->buyer->email, 'Order Placed');
    // sending order whatsapp notification to buyer after successful order
    $this->newOrderNotification($order);
    // giving bonus amount to the referrer if order is via referral after successful order
    AddReferralBonusAmountToWalletOfReferrer::run(Buyer::find(Auth::guard('buyer')->user()->id), $order);
    // dividing wallet and allocating amounts of wallet & giftcard among all the ordered products after successful order
    DivideAndAllocateWalletAndGiftCardAmount::run(SupplierOrder::where('order_id', '=', $order->id)->get());
    // emptying cart session
    session()->forget('cart_id');

    return view('customer.order.order-successful', compact('order', 'giftTotal'));
  }

  public function orderFailed(int $orderId)
  {
    $order = Order::find($orderId);

    if ($order->status != 8)
      return redirect()->route('home');

    // getting order data
    $cartProducts = $this->cartRepository->getCartData($order->cart_id);
    $giftTotal = $this->cartRepository->getGiftTotal($cartProducts);

    // changing cart items status to order placed
    $this->cartRepository->changeCartItemsStatus($order->cart_id, 1);

    // copying just created order into sellers order table
    $this->orderRepository->mapOrderToSuppliersOrderTable($order, $cartProducts);

    $this->orderRepository->updateStatus($orderId, 8);

    ChangeProductOrderStatus::run($order->cart_id, 8, $order->buyer->fullName, 'Buyer');
    // dividing wallet and allocating amounts of wallet & giftcard among all the ordered products after successful order
    DivideAndAllocateWalletAndGiftCardAmount::run(SupplierOrder::where('order_id', '=', $order->id)->get());
    // emptying cart session
    session()->forget('cart_id');
    return view('customer.order.order-failed', compact('order', 'giftTotal'));
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
    $giftTotal = $order->gift_pricing * $order->quantity;

    return view('customer.profile.order-detail', compact('order', 'giftTotal'));
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

  public function status(int $id, int $status)
  {
    $this->orderRepository->updateStatus($id, $status);
    return back()->with('sucsess', 'Order Status has been updated');
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
