<?php

namespace App\Actions\Customer\Buyer;

use Exception;
use App\Models\Buyer\Cart;
use App\Models\Buyer\Order;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Ecommerce\GiftCard;
use Lorisleiva\Actions\Concerns\AsAction;

class ApplyGiftCard
{
  use AsAction, ApiResponser;

  public function handle(Request $request)
  {
    try {
      // check if the giftcard exists.
      if (GiftCard::where('gift_card', '=', $request->code)->doesntExist())
        throw new Exception('Gift card not found!');

      $giftCard = GiftCard::where('gift_card', '=', $request->code)->first();

      if ($giftCard->user_id === auth()->user()->id)
        throw new Exception('Gift card already used!');

      // check if the giftcard is expired.
      if (now()->gt($giftCard->date_till))
        throw new Exception('Gift card expired!');

      $giftCardAmount = $giftCard->amount - $giftCard->used_amount;
      $giftCardCode = $giftCard->gift_card;

      return $this->successResponse(compact('giftCardAmount', 'giftCardCode'), 'Gift card applied successfully');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage(), 500);
    }
  }
}
