<?php

namespace App\Actions\Admin\Products;

use App\Traits\ApiResponser;
use App\Models\Buyer\CartRemark;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class AbandonedCartProductRemarks
{
  use AsAction, ApiResponser;

  public function handle(int $id): JsonResponse
  {
    return $this->successResponse(CartRemark::where('product_cart_id', $id)->get());
  }
}
