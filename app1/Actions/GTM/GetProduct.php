<?php

namespace App\Actions\GTM;

use App\Traits\ApiResponser;
use App\Models\Ecommerce\Product;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class GetProduct
{
  use AsAction, ApiResponser;

  public function handle(int $productId): JsonResponse
  {
    try {
      $product = Product::with('mappedCategories', 'brand', 'productTypeValueOne')->findOrFail($productId);
      return $this->successResponse($product);
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }
}
