<?php

namespace App\Actions;

use App\Models\Ecommerce\Product;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class GetProductsViaBrands
{
  use AsAction, ApiResponser;

  public function handle(Request $request)
  {
    return $this->successResponse(Product::whereIn('brand_id', array_map('intval', $request->brandIds))->orderBy('name')->select('id', 'name', 'sku')->get());
  }
}
