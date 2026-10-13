<?php

namespace App\Actions\Customer;

use App\Models\Event;
use Illuminate\View\View;
use Lorisleiva\Actions\Concerns\AsAction;

class EventDetail
{
  use AsAction;

  public function asController(string $slug): View
  {
    $event = Event::where([['status', '=', 1], ['slug', '=', $slug]])->firstOrFail();
    return view('customer.static.tfe-event-details', compact('event'));
  }
}
