<?php

namespace App\Actions\Cron;

use Carbon\Carbon;
use App\Traits\Wallet;
use App\Models\Buyer\Cart;
use Illuminate\Support\Facades\Mail;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Mail\Customer\CreditRewardAllotment as CreditRewardAllotmentMail;

class CreditRewardAllotment
{
  use AsAction, Wallet;

  public function handle(): void
  {
    $orders = Cart::where([['order_status', '=', 1], ['status', '=', 5], ['reward_notification', '=', 0]])
      ->whereHas('orderItemDetail', function ($q) {
        $q->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', '2023-01-10')->startOfDay(), Carbon::createFromFormat('Y-m-d', '2023-01-31')->endOfDay()]);
      })
      ->limit(50)
      ->get();

    foreach ($orders as $order) {
      $grandTotal = $order->orderItemDetail->grand_total + $order->orderItemDetail->shipping_charge - $order->coupon_amount - ($order->orderItemDetail->wallet_used + $order->orderItemDetail->gift_card_amount + $order->orderItemDetail->referral_amount);

      $thirtyPercentOfGrandTotal = (30 / 100) * $grandTotal;
      $this->addJanuaryDeliveredWalletBonus($order->buyer, $thirtyPercentOfGrandTotal, $order->orderItemDetail->id);
      Mail::to($order->buyer->email)->send(new CreditRewardAllotmentMail(['customerName' => $order->buyer->fullName, 'orderId' => $order->orderItemDetail->order_id_counter, 'rewardPoints' => $thirtyPercentOfGrandTotal, 'orderDate' => $order->orderItemDetail->created_at->format('d, M Y')]));
      $order->update(['reward_notification' => 1]);
    }
  }
}
