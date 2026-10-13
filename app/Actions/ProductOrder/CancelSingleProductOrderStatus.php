<?php

namespace App\Actions\ProductOrder;

use App\Models\Buyer\Cart;
use App\Models\Supplier\SupplierOrder;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Actions\Admin\Orders\OrderStatusChangeMail;
use App\Traits\WhatsappNotification;

class CancelSingleProductOrderStatus
{
  use AsAction, WhatsappNotification;

  public function handle(int $id, int $status, string $actionBy, string $type, bool $createOrderHistory = true): bool
  {
    $orderItem = Cart::find($id);
    $supplierOrderId = $orderItem->supplier_order_id;
    $supplierOrderItem = SupplierOrder::findOrFail($supplierOrderId);
    $supplierOrderItem->status = $status;
    $orderItem->status = $status;
    $supplierOrderItem->save();
    $orderItem->save();

    if ($createOrderHistory)
      CreateOrderHistory::run($status, $supplierOrderId, $actionBy, $type);

    OrderStatusChangeMail::run([$orderItem->id], $status);
    $this->orderCancelledByCustomerWhatsappNotification($supplierOrderItem);
    return true;
  }
}
