<?php

namespace App\Actions\Customer;

use App\Traits\FileUpload;
use Illuminate\Http\RedirectResponse;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\EventExhibitorRegistration;
use App\Http\Requests\Event\EventExhibitorRegistrationRequest;

class EventExhibitorRegister
{
  use AsAction, FileUpload;

  public function asController(EventExhibitorRegistrationRequest $request): RedirectResponse
  {
    if ($request->hasfile('lookbook_pdf'))
      $request->request->add(['lookbook' => $this->handleSingleFileUpload($request->lookbook_pdf, 'uploads/events/')]);

    EventExhibitorRegistration::create($request->only('event_id', 'lookbook', 'name', 'email', 'mobile', 'link'));
    return back()->with('success', 'Your registration request has been successfully sent');
  }
}
