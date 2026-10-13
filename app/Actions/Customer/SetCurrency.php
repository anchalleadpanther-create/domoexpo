<?php

namespace App\Actions\Customer;

use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class SetCurrency
{
  use AsAction;

  public function asController(Request $request)
  {
    $currency = $request->currency;
    $countryId = $request->countryId;
    session(['currency' => $currency,'countryId' => $countryId]);
    return redirect()->back();
  }
}
