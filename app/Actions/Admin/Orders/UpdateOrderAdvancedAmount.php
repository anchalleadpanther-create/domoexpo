<?php

namespace App\Actions\Admin\Orders;

use Illuminate\Http\Request;
use App\Traits\WhatsappNotification;
use Illuminate\Http\RedirectResponse;
use App\Models\Supplier\SupplierOrder;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Actions\Admin\Orders\OrderStatusChangeMail;

class UpdateOrderAdvancedAmount
{
  use AsAction, WhatsappNotification;

  public function handle(Request $request, int $id): RedirectResponse
  {
    if (number_format($request->total, 2, '.', '') === number_format($request->advance_amount, 2, '.', ''))
      SupplierOrder::findOrFail($id)->update(['payment_method' => 'Prepaid']);

    SupplierOrder::findOrFail($id)->update(['advance_amount' => $request->advance_amount]);
    $this->CODSingleOrderConfirmation(SupplierOrder::findOrFail($id)->cartItem);
    OrderStatusChangeMail::run([SupplierOrder::findOrFail($id)->cart_item_id], 1);
    return back()->with('success', 'Advanced amount has been updated');
  }
}
