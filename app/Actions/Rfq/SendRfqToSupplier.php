<?php

namespace App\Actions\Rfq;

use Illuminate\Http\Request;
use App\Models\Customer\Buyer\Rfq;
use Lorisleiva\Actions\Concerns\AsAction;

class SendRfqToSupplier
{
  use AsAction;

  public function handle(Request $request)
  {
    $rfq = Rfq::find((int)$request->rfq_id);
    $rfq->suppliers()->detach();

    if (is_array($request->supplier_id) && !empty($request->supplier_id)) {
      foreach ($request->supplier_id as $value) {
        $rfq->suppliers()->attach((int)$request->rfq_id, ['supplier_id' => (int)$value]);
      }
    }
    return back()->with('success', 'Rfq has been sent to the suppliers!');
  }
}
