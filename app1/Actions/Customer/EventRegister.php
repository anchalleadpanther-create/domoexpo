<?php

namespace App\Actions\Customer;

use App\Models\EventRegistration;
use Illuminate\Http\RedirectResponse;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Http\Requests\Event\EventRegistrationRequest;

class EventRegister
{
  use AsAction;

  public function asController(EventRegistrationRequest $request): RedirectResponse
  {
    EventRegistration::create($request->validated());
    return back()->with('success', 'Your registration request has been successfully sent');
  }
}
