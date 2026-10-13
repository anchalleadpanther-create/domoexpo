<?php

namespace App\Actions\Customer\Experts;

use App\Models\Buyer\Buyer;
use Illuminate\View\View;
use Lorisleiva\Actions\Concerns\AsAction;

class Experts
{
  use AsAction;

  public function handle(): View
  {
    $experts = Buyer::where('is_expert', '=', 1)->has('defaultPackage')->paginate(50);
    return view('customer.experts.index', compact('experts'));
  }
}
