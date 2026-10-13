<?php

namespace App\Actions\Cron;

use App\Models\Buyer\Cart;
use App\Mail\Customer\AbandonedCart;
use App\Traits\WhatsappNotification;
use Illuminate\Support\Facades\Mail;
use Lorisleiva\Actions\Concerns\AsAction;

class AbdandonedCartNotification
{
  use AsAction, WhatsappNotification;

  public function handle(): void
  {
    $products = Cart::where([['buyer_id', '!=', NULL], ['order_status', '=', 0], ['abandoned_notification', '=', false]])
      ->orderByDesc('id')
      ->limit(10)
      ->get();

    foreach ($products as $product) {
      Mail::to($product->buyer->email)->send(new AbandonedCart(['product' => $product]));
      $this->abandonedCartWhatsappNotification($product->buyer);
      $product->update(['abandoned_notification' => true]);
    }
  }
}
