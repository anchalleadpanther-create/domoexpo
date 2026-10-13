<?php

namespace App\Actions\ProductOrder;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Supplier\SupplierOrderStatus;

class CreateOrderHistory
{
  use AsAction;

  public function handle(int $status, int $supplierOrderId, string $actionBy, string $type, $remark = null): bool
  {
    switch ($status) {
      case 0:
        SupplierOrderStatus::create([
          'supplier_order_id' => $supplierOrderId,
          'status' => 'Order Placed',
          'action_by' => $actionBy,
          'type' => $type,
          'remark' => $remark
        ]);
        break;
      case 1:
        SupplierOrderStatus::create([
          'supplier_order_id' => $supplierOrderId,
          'status' => 'Order Accepted',
          'action_by' => $actionBy,
          'type' => $type,
          'remark' => $remark
        ]);
        break;
      case 2:
        SupplierOrderStatus::create([
          'supplier_order_id' => $supplierOrderId,
          'status' => 'Order Packed',
          'action_by' => $actionBy,
          'type' => $type,
          'remark' => $remark
        ]);
        break;
      case 3:
        SupplierOrderStatus::create([
          'supplier_order_id' => $supplierOrderId,
          'status' => 'Order Ready to Ship',
          'action_by' => $actionBy,
          'type' => $type,
          'remark' => $remark
        ]);
        break;
      case 4:
        SupplierOrderStatus::create([
          'supplier_order_id' => $supplierOrderId,
          'status' => 'Order Shipped',
          'action_by' => $actionBy,
          'type' => $type,
          'remark' => $remark
        ]);
        break;
      case 5:
        SupplierOrderStatus::create([
          'supplier_order_id' => $supplierOrderId,
          'status' => 'Order Delivered',
          'action_by' => $actionBy,
          'type' => $type,
          'remark' => $remark
        ]);
        break;
      case 6:
        SupplierOrderStatus::create([
          'supplier_order_id' => $supplierOrderId,
          'status' => 'Order Cancelled',
          'action_by' => $actionBy,
          'type' => $type,
          'remark' => $remark
        ]);
        break;
      case 7:
        SupplierOrderStatus::create([
          'supplier_order_id' => $supplierOrderId,
          'status' => 'Order Returned',
          'action_by' => $actionBy,
          'type' => $type,
          'remark' => $remark
        ]);
        break;
      case 8:
        SupplierOrderStatus::create([
          'supplier_order_id' => $supplierOrderId,
          'status' => 'Order Pending',
          'action_by' => $actionBy,
          'type' => $type,
          'remark' => $remark
        ]);
        break;
      default:
        dd("Wrong status code sent.");
        break;
    }
    return true;
  }
}
