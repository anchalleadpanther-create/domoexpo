<?php

namespace App\Actions\ProductOrder;

use App\Models\Buyer\Cart;
use App\Models\Supplier\SupplierOrder;
use Lorisleiva\Actions\Concerns\AsAction;

class ChangeProductOrderStatus
{
  use AsAction;

  public function handle(int $id, int $status, string $actionBy, string $type, bool $createOrderHistory = true): bool
  {
    $orderItem = Cart::where('cart_id', '=', $id)->firstOrFail();
    $supplierOrderId = $orderItem->supplier_order_id;
    $supplierOrderItem = SupplierOrder::findOrFail($supplierOrderId);
    $supplierOrderItem->status = $status;
    $orderItem->status = $status;
    $supplierOrderItem->save();
    $orderItem->save();

    Cart::whereIn('cart_id', [$id])->update(['status' => $status, 'buyer_id' => $supplierOrderItem->buyer->id]);

    if ($createOrderHistory) {
      $supplierOrderIds = Cart::where('cart_id', '=', $id)->pluck('supplier_order_id')->toArray();
      foreach ($supplierOrderIds as $supplierOrderId)
        CreateOrderHistory::run($status, $supplierOrderId, $actionBy, $type);
    }

    return true;
  }
}
