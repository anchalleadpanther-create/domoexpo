<?php

namespace App\Actions;

use App\Models\Buyer\Order;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use App\Models\Supplier\SupplierOrder;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Actions\ProductOrder\DivideAndAllocateWalletAndGiftCardAmount;

class ApplyPatch
{
  use AsAction, ApiResponser;

  public function handle(): JsonResponse
  { 
    
    try {
      foreach (Order::get() as $order)
        DivideAndAllocateWalletAndGiftCardAmount::run(SupplierOrder::where('order_id', '=', $order->id)->get());

      return $this->successResponse([], 'done');
    } catch (\Throwable $th) {
      dd($th);
      return $this->errorResponse([], $th->getMessage());
    }
  }
}
