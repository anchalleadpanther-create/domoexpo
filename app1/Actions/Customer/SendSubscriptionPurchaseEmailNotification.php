<?php

namespace App\Actions\Customer;

use App\Models\Buyer\Buyer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Customer\BuyerSubscriptionPurchaseEmail;
use Lorisleiva\Actions\Concerns\AsAction;

class SendSubscriptionPurchaseEmailNotification
{
  use AsAction;

  public function handle(Buyer $buyer): bool
  {

    Mail::to($buyer->email)->send(new BuyerSubscriptionPurchaseEmail([
      'buyer' => $buyer
      'purchaseHistory' => $purchaseHistory
    ]));
    return true;
  }
}
