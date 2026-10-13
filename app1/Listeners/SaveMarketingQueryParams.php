<?php

namespace App\Listeners;

use App\Models\UTM;
use App\Events\OrderCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveMarketingQueryParams
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
   * @param  \App\Events\OrderCreated  $event
   * @return void
   */
  public function handle(OrderCreated $event): void
  {
    if (session()->has('utm_source')) {
      $utm = UTM::firstOrCreate([
        'utm_source' => session()->get('utm_source'),
        'utm_medium' => session()->get('utm_medium'),
        'utm_campaign' => session()->get('utm_campaign'),
        'utm_term' => session()->get('utm_term'),
        'utm_content' => session()->get('utm_content'),
      ]);
      $event->order->update(['utm_id' => $utm->id]);
      session()->forget(['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content']);
    }
  }
}
