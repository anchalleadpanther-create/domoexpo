<?php

namespace App\Actions\Customer\Experts;

use Illuminate\View\View;
use App\Models\Buyer\Package;
use Lorisleiva\Actions\Concerns\AsAction;

class ExpertPackageDetail
{
  use AsAction;

  public function handle(string $packageName, int $id): View
  {
    $package = Package::findOrFail($id);
    return view('customer.experts.package-detail', compact('package'));
  }
}
