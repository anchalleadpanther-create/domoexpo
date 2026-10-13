<?php

namespace App\Actions\Admin\Orders;

use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Models\Supplier\SupplierOrder;
use App\Mail\Admin\PurchaseOrderAccept;
use Lorisleiva\Actions\Concerns\AsAction;

class PurchaseOrderStatusAdmin
{
  use AsAction;

  public function handle(int $status, string $pdfName): RedirectResponse
  {
    $orderIds = implode(", ", SupplierOrder::whereIn('po_document', [$pdfName])->pluck('order_id_counter')->toArray());

    // if (SupplierOrder::where('po_document', '=', [$pdfName])->value('po_status'))
    //   return back()->with('success', 'Purchase order status has been changed');

    SupplierOrder::whereIn('po_document', [$pdfName])->update(['po_status' => $status, 'po_status_date' => now()]);
    $order = SupplierOrder::whereIn('po_document', [$pdfName])->first();
    $supplier = $order->cartItem->seller;

    Mail::to($supplier->biz_email)->send(new PurchaseOrderAccept(['orderIds' => $orderIds, 'cancelledBy' => 'FEI', 'status' => $status]));

    return back()->with('success', 'Purchase order status has been changed');
  }
}
