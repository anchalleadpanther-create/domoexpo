<?php

namespace App\Actions\Customer;

use App\Models\Event;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Lorisleiva\Actions\Concerns\AsAction;

class Events
{
  use AsAction;

  public function asController(): View
  {
    $upcomingEvents = Event::where([['status', '=', 1], ['type', '=', 'Upcoming Event']])->orderBy('date')->get();
    $pastEvents = Event::where([['status', '=', 1], ['type', '=', 'Past Event']])->orderByDesc('date')->get();
    $pastEventsImages = array_slice(Arr::shuffle(Arr::flatten($pastEvents->pluck('images'))), 0, 16);

    return view('customer.static.tfe-events', compact('upcomingEvents', 'pastEvents', 'pastEventsImages'));
  }
}
