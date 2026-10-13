<?php

namespace App\Actions\Customer;

use App\Models\Buyer\Order;
use App\Models\Buyer\OrderDateReport;
use Lorisleiva\Actions\Concerns\AsAction;

class AddOrderToOrderDateReport
{
  use AsAction;

  public function handle(int $buyerId, string $date, float $grandTotal): void
  {
    $ordersCount = Order::where('user_id', '=', $buyerId)->count();
    $orderExistsForTheGivenDate = OrderDateReport::whereDate('date', '=', $date)->exists();

    if ($ordersCount === 1) {
      if ($orderExistsForTheGivenDate) {
        OrderDateReport::where('date', '=', $date)->increment('new_order', 1);
        OrderDateReport::where('date', '=', $date)->increment('new_order_value', $grandTotal);
      } else {
        OrderDateReport::create(['date' => now()->format('d-m-Y'), 'new_order' => 1, 'new_order_value' => $grandTotal]);
      }
    } else {
      if ($orderExistsForTheGivenDate) {
        OrderDateReport::where('date', '=', $date)->increment('returning_order', 1);
        OrderDateReport::where('date', '=', $date)->increment('returning_order_value', $grandTotal);
      } else {
        OrderDateReport::create(['date' => now()->format('d-m-Y'), 'returning_order' => 1, 'returning_order_value' => $grandTotal]);
      }
    }
  }
}
