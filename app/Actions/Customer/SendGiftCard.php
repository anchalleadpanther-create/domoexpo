<?php

namespace App\Actions\Customer;

use App\Models\Buyer\Order;
use App\Models\Ecommerce\GiftCard;
use Illuminate\Support\Facades\Mail;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Mail\SendGiftCard as MailSendGiftCard;

class SendGiftCard
{
  use AsAction;

  public function handle(Order $order): void
  {
    foreach ($order->orderItems as $product) {
      if ($product->sku === 'LTGIFTCARD') {
        $product->update(['gift_card_code' => $this->generateGiftCard($product->price_unit)]);
        Mail::to($product->gift_card_data['to_email'])->send(new MailSendGiftCard(['product' => $product]));
      }
    }
  }

  private function generateGiftCard($price): string
  {
    do {
      $giftCardName = $this->generateUniqueGiftCardName();
    } while ($this->giftCardNameExists($giftCardName));
    GiftCard::create(['user_id' => auth()->user()->id, 'gift_card' => $giftCardName, 'amount' => $price, 'date_from' => date('Y-m-d'), 'date_till' => date('Y-m-d', strtotime(date('Y-m-d') . ' +1 year')), 'used_amount' => 0]);
    return $giftCardName;
  }

  private function generateUniqueGiftCardName(): string
  {
    $prefix = 'LT';
    $suffix = rand(1000, 999999);

    return $prefix . $suffix;
  }

  private function giftCardNameExists($giftCardName): bool
  {
    return GiftCard::where('gift_card', $giftCardName)->exists();
  }
}
