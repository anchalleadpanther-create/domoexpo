<?php

namespace App\Actions\Customer\Experts;

use App\Models\Buyer\Buyer;
use Illuminate\View\View;
use Lorisleiva\Actions\Concerns\AsAction;

class ExpertPackages
{
  use AsAction;

  public function handle(string $fullName, int $id): View
  {
    $expert = Buyer::where([['id', '=', $id], ['is_expert', '=', 1]])->firstOrFail();
    return view('customer.experts.packages', compact('expert'));
  }
}
