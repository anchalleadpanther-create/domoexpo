<?php

namespace App\Traits;

use Carbon\Carbon;
use App\Models\Buyer\Buyer;
use App\Models\Buyer\Order;

trait Wallet
{
  private static float $defaultBonusPoint = 1000.00;

  public function addRegistrationBonusPoints(Buyer $buyer): bool
  {
    $buyer->walletHistory()->create([
      'title' => 'Signup With FEI',
      'amount' => self::$defaultBonusPoint,
      'type' => 'CREDIT',
      'balance' => self::$defaultBonusPoint,
      'remark' => 'Registration Credits',
    ]);
    return true;
  }

  public function addReferralBonusPoints(Buyer $buyer, int $orderId): bool
  {
    $buyer->walletHistory()->create([
      'title' => 'Referral Bonus From FEI',
      'amount' => \App\Helpers\Referral::getDetails()->referralBonusForReferrer,
      'type' => 'CREDIT',
      'balance' => $buyer->wallet,
      'remark' => 'Referral Bonus',
      'order_id' => $orderId,
    ]);
    return true;
  }

  public function orderWalletUpdate(Buyer $buyer, int $orderId): bool
  {
    $order = Order::find($orderId);
    $amount = $buyer->wallet > $order->grand_total ? $order->grand_total :  $buyer->wallet;
    $buyer->walletHistory()->create([
      'title' => 'Points Used in Purchase',
      'order_id' => $orderId,
      'amount' => $amount,
      'type' => 'DEBIT',
      'balance' => $amount,
      'remark' => 'Points Redeemed',
    ]);
    $buyer->decrement('wallet', $amount);
    return true;
  }

  public function giftCardWalletUpdate(Buyer $buyer, $remainingGiftCardAmount): bool
  {
    $buyer->walletHistory()->create([
      'title' => 'Points Credit from Gift Card',
      'amount' => $remainingGiftCardAmount,
      'type' => 'CREDIT',
      'balance' => $remainingGiftCardAmount,
      'remark' => 'Points Credited',
    ]);
    return true;
  }

  public function updateWallet(Buyer $buyer, $request): bool
  {
    $buyer->walletHistory()->create([
      'user_id' => auth()->user()->id,
      'title' => 'Points ' . $request->transaction_type . 'ed',
      'amount' => $request->amount,
      'type' => strtoupper($request->transaction_type),
      'balance' => $request->amount,
      'order_id_supplier' => $request->order_id,
      'remark' => $request->remark,
    ]);

    if ($request->transaction_type === 'Credit')
      $buyer->increment('wallet', $request->amount);
    else
      $buyer->decrement('wallet', $request->amount);

    return true;
  }

  public function addJanuaryDeliveredWalletBonus(Buyer $buyer, $amount, int $orderId): bool
  {
    $buyer->walletHistory()->create([
      'title' => 'Points Credited from Order Delivery',
      'amount' => $amount,
      'type' => 'CREDIT',
      'balance' => $amount,
      'remark' => 'Points Credited',
      'order_id_supplier' => $orderId,
    ]);
    $buyer->increment('wallet', $amount);
    return true;
  }

  public function ivoryTierWalletBonus(Buyer $buyer, $amount): bool
  {
    $buyer->walletHistory()->create([
      'title' => 'Ivory Tier Bonus Points',
      'amount' => $amount,
      'type' => 'CREDIT',
      'balance' => $amount,
      'remark' => 'Points Credited',
    ]);
    $buyer->increment('wallet', $amount);
    return true;
  }

  public function silverTierWalletBonus(Buyer $buyer, $amount): bool
  {
    $buyer->walletHistory()->create([
      'title' => 'Silver Tier Bonus Points',
      'amount' => $amount,
      'type' => 'CREDIT',
      'balance' => $amount,
      'remark' => 'Points Credited',
    ]);
    $buyer->increment('wallet', $amount);
    return true;
  }
}
