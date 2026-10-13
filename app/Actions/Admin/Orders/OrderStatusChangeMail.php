<?php

namespace App\Actions\Admin\Orders;

use App\Models\Buyer\Cart;
use App\Models\Buyer\Order;
use App\Mail\Admin\OrderShipped;
use App\Mail\Admin\OrderCancelled;
use App\Mail\Admin\OrderConfirmed;
use App\Mail\Admin\OrderDelivered;
use Illuminate\Support\Facades\Mail;
use App\Models\Supplier\SupplierOrder;
use Lorisleiva\Actions\Concerns\AsAction;

class OrderStatusChangeMail
{
  use AsAction;

  public function handle(array $ids, string $status, string $trackingUrl = NULL): bool
  {
    $orderDetail = Cart::find($ids[0]);
    $email = $orderDetail->buyer->email;
    $orderItems = Cart::whereIn('id', $ids)->get();
    $orderedProducts = SupplierOrder::whereIn('cart_item_id', $orderItems->pluck('id')->toArray())->get();
    $order = Order::find($orderedProducts[0]->order_id);

    $subTotal = $tax = $walletDiscount = $couponDiscount = $referralDiscount = $giftCardDiscount = $shipping = $advanceAmount = $giftTotal = $grandTotal = 0;

    foreach ($orderedProducts as $product) {
      $subTotal += $product->grand_total * $order->currency_con_ratio;
      $giftTotal += ($product->cartItem->gift_pricing * $product->cartItem->quantity) * $order->currency_con_ratio;
      $shipping += $product->shipping_charge * $order->currency_con_ratio;
      $advanceAmount += $product->advance_amount * $order->currency_con_ratio;

      $walletDiscount += $product->wallet_used * $order->currency_con_ratio;
      $couponDiscount += $product->cartItem->coupon_amount * $order->currency_con_ratio;
      $referralDiscount += $product->referral_amount * $order->currency_con_ratio;
      $giftCardDiscount += $product->gift_card_amount * $order->currency_con_ratio;
    }

    $grandTotal = ($subTotal + $giftTotal + $shipping) - ($walletDiscount + $couponDiscount + $referralDiscount);
    $amounts = ['subTotal' => $subTotal, 'shipping' => $shipping, 'advanceAmount' => $advanceAmount, 'walletDiscount' => $walletDiscount, 'couponDiscount' => $couponDiscount, 'referralDiscount' => $referralDiscount, 'giftCardDiscount' => $giftCardDiscount, 'giftTotal' => $giftTotal, 'grandTotal' => $grandTotal];

    switch ($status) {
      case 1:
        Mail::to($email)->send(new OrderConfirmed([
          'order' => $orderDetail->orderItemDetail->order,
          'status' => $status,
          'orderItems' => $orderItems,
          'trackingUrl' => $trackingUrl,
          'amounts' => $amounts
        ]));
        break;
      case 4:
        Mail::to($email)->send(new OrderShipped([
          'order' => $orderDetail->orderItemDetail->order,
          'status' => $status,
          'orderItems' => $orderItems,
          'trackingUrl' => $trackingUrl,
          'amounts' => $amounts
        ]));
        break;
      case 5:
        Mail::to($email)->send(new OrderDelivered([
          'order' => $orderDetail->orderItemDetail->order,
          'status' => $status,
          'orderItems' => $orderItems,
          'trackingUrl' => $trackingUrl,
          'amounts' => $amounts
        ]));
        break;
      case 6:
        Mail::to($email)->send(new OrderCancelled([
          'order' => $orderDetail->orderItemDetail->order,
          'status' => $status,
          'orderItems' => $orderItems,
          'trackingUrl' => $trackingUrl,
          'amounts' => $amounts,
          'cancelledBy' => $orderDetail->activities->first()->type,
        ]));
        break;
    }

    return true;
  }
}
