<?php

namespace App\Actions\Admin\Orders;

use App\Models\Buyer\Cart;
use App\Traits\WhatsappNotification;
use App\Models\Supplier\SupplierOrder;
use App\Traits\CustomerMembershipPoints;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Actions\ProductOrder\CreateOrderHistory;

class ChangeProductOrderStatusViaAdmin
{
  use AsAction, WhatsappNotification;

  public function handle(int $id, int $status, string $actionBy, string $type): bool
  {
    try {
      $supplierOrderItem = SupplierOrder::findOrFail($id);
      $supplierOrderItem->status = $status;
      $supplierOrderItem->save();
      Cart::find($supplierOrderItem->cart_item_id)->update(['status' => $status]);
      CreateOrderHistory::run($status, $supplierOrderItem->id, $actionBy, $type, request()->remark);

      if (isset(request()->remark))
        return true;

      switch ($status):
        case 1:
          GeneratePOAndSendMail::run([$supplierOrderItem->id]);
          // if ($supplierOrderItem->shipping_country_id !== 101) $this->orderConfirmationInternationalOrder($supplierOrderItem->order);
          // elseif ($supplierOrderItem->payment_method !== 'Cash on Delivery') $this->orderConfirmationPrepaidOrder($supplierOrderItem->order);
          break;
        case 2:
          Cart::where('id', $supplierOrderItem->cart_item_id)->update(['packed_at' => now()]);
          break;
        case 3:
          $dimensions = ['length' => request()->length, 'height' => request()->height, 'width' => request()->width, 'weight' => request()->weight];
          GenerateOrderInvoiceIdAndGenerateManifest::run([$supplierOrderItem->cart_item_id], $status, $dimensions);
          Cart::where('id', $supplierOrderItem->cart_item_id)->update(['shipped_at' => now()]);
          $invoice = GenerateInvoice::run(Cart::whereIn('id', [$supplierOrderItem->cart_item_id])->get());
          $supplierOrderItem->update(['invoice_document' => $invoice]);
          break;
        case 4:
          $this->orderDispatched($supplierOrderItem->order);
          break;
        case 5:
          CustomerMembershipPoints::incrementPoints($supplierOrderItem->grand_total, $supplierOrderItem->user_id);
          $this->orderDelivered($supplierOrderItem->order);
          break;
        case 6:
          // $this->orderCancelled($supplierOrderItem->order);
          $this->orderCancelledByAdminWhatsappNotification($supplierOrderItem->order);
          Cart::where('id', $supplierOrderItem->cart_item_id)->update(['cancelled_at' => now()]);
          $productsForCreditNote = Cart::where('id', $supplierOrderItem->cart_item_id)
            ->whereHas('orderItemDetail', function ($q) {
              $q->where('invoice_document', '!=', NULL);
            })
            ->get();
          if (!$productsForCreditNote->isEmpty()) {
            $creditNote = GenerateCreditNote::run($productsForCreditNote);
            SupplierOrder::where('id', $supplierOrderItem->id)->update(['credit_note_document' => $creditNote]);
          }
          break;
      endswitch;

      if ($status !== 1)
        OrderStatusChangeMail::run([$supplierOrderItem->cart_item_id], $status);

      return true;
    } catch (\Throwable $th) {
      dd($th, $th->getMessage());
    }
  }
}
