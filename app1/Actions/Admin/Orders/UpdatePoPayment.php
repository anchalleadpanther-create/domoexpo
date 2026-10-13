<?php

namespace App\Actions\Admin\Orders;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Supplier\SupplierOrder;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdatePoPayment
{
  use AsAction;

  public function handle(Request $request): RedirectResponse
  {
    SupplierOrder::find($request->supplierOrderId)->update(['payment_invoice_number' => $request->payment_invoice_number, 'payment_amount' => $request->payment_amount]);
    return back()->with('success', 'Payment updated successfully');
  }
}
