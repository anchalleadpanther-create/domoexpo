<?php

namespace App\Actions\Admin;

use Illuminate\View\View;
use App\Models\Extensions\Newsletter;
use Lorisleiva\Actions\Concerns\AsAction;

class NewsletterUsers
{
  use AsAction;

  public function handle(): View
  {
    $newsletters = Newsletter::latest()->paginate(200);
    return view('extensions.newsletter-users', compact('newsletters'));
  }
}
