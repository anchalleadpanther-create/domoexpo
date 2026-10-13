<?php

namespace App\Actions\Admin\Orders;

use App\Models\Buyer\Cart;
use Illuminate\Http\RedirectResponse;
use App\Models\Supplier\SupplierOrder;
use Lorisleiva\Actions\Concerns\AsAction;

class RegenerateInvoice
{
  use AsAction;

  public function handle(string $invoiceDocument): RedirectResponse
  {
    try {
      $invoice = GenerateInvoice::run(Cart::whereIn('id', SupplierOrder::where('invoice_document', '=', $invoiceDocument)->pluck('cart_item_id')->toArray())->get());
      SupplierOrder::where('invoice_document', '=', $invoiceDocument)->update(['invoice_document' => $invoice]);
      return back()->with('success', 'Invoice regenerated!');
    } catch (\Throwable $th) {
      dd($th);
    }
  }
}
