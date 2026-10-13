<?php

namespace App\Actions\Admin\Orders;

use App\Mail\Admin\PurchaseOrderAccept;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Models\Supplier\SupplierOrder;
use Lorisleiva\Actions\Concerns\AsAction;

class PurchaseOrderStatus
{
  use AsAction;

  public function handle(int $status, string $pdfName): View
  {
    $orderIds = implode(", ", SupplierOrder::whereIn('po_document', [$pdfName])->pluck('order_id_counter')->toArray());

    if (SupplierOrder::where('po_document', '=', [$pdfName])->value('po_status'))
      return view('customer.static.thank-you', compact('orderIds', 'status'));

    SupplierOrder::whereIn('po_document', [$pdfName])->update(['po_status' => $status, 'po_status_date' => now()]);
    $order = SupplierOrder::whereIn('po_document', [$pdfName])->first();
    $supplier = $order->cartItem->seller;

    Mail::to(config('myconfig.ADMIN_EMAIL'))
      ->cc(projectCCEmails())
      ->send(new PurchaseOrderAccept(['orderIds' => $orderIds, 'cancelledBy' => $supplier->biz_name, 'status' => $status]));

    return view('customer.static.thank-you', compact('orderIds', 'status'));
  }
}
