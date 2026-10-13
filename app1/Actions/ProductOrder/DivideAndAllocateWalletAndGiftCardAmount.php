<?php

namespace App\Actions\ProductOrder;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Database\Eloquent\Collection;

class DivideAndAllocateWalletAndGiftCardAmount
{
  use AsAction;

  public function handle(Collection $orderItems): bool
  {
    $grandTotalOfAllProducts = $orderItems->sum('grand_total');
    $totalWalletAmount = $orderItems[0]->order->wallet;
    $totalGiftCardAmount = $orderItems[0]->order->gift_card_amount;
    $totalReferralAmount = $orderItems[0]->order->referral_amount;
    $totalShippingAmount = $orderItems[0]->order->shipping_charge;
    foreach ($orderItems as $item) {
      $productTotal = $item->grand_total;
      $productPercentage = ($productTotal * 100) / $grandTotalOfAllProducts;
      $walletAmount = ($totalWalletAmount * $productPercentage) / 100;
      $giftCardAmount = ($totalGiftCardAmount * $productPercentage) / 100;
      $referralAmount = ($totalReferralAmount * $productPercentage) / 100;
      $shippingAmount = ($totalShippingAmount * $productPercentage) / 100;

      $item->update(['wallet_used' => $walletAmount, 'gift_card_amount' => $giftCardAmount, 'referral_amount' => $referralAmount, 'shipping_charge' => $shippingAmount]);
    }
    return true;
  }
}
