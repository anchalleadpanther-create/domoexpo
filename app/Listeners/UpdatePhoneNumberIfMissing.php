<?php

namespace App\Listeners;

use App\Models\Buyer\Buyer;
use App\Events\AddressCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdatePhoneNumberIfMissing
{
  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   *
   * @param  \App\Events\AddressCreated  $event
   * @return void
   */
  public function handle(AddressCreated $event): void
  {
    $buyer = Buyer::find($event->address->user_id);
    if (!isset($buyer->phone))
      $buyer->update(['phone' => $event->address->mobile]);
  }
}
