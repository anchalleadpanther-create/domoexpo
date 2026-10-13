<?php

namespace App\Actions;

use App\Models\Extensions\Page;
use Lorisleiva\Actions\Concerns\AsAction;

class StaticPage
{
  use AsAction;

  public function handle($slug)
  {
    //   return $slug;
    $page = Page::where('slug', $slug)->firstOrFail();
    return view('marketplace.page.static-pages', compact('page'));
  }
}
