<?php

namespace App\Actions\Customer;

use App\Traits\Wallet;
use App\Models\Buyer\Buyer;
use App\Models\Buyer\Order;
use Lorisleiva\Actions\Concerns\AsAction;

class AddReferralBonusAmountToWalletOfReferrer
{
  use AsAction, Wallet;

  public function handle(Buyer $buyer, Order $order): void
  {
    if ($buyer->OrdersCount === 1 && isset($buyer->referred_by) && $order->grand_total > 5000) {
      $referrer = Buyer::find($buyer->referred_by);
      $referrer->increment('wallet', \App\Helpers\Referral::getDetails()->referralBonusForReferrer);
      $this->addReferralBonusPoints($referrer, $order->id);
    }
  }
}
