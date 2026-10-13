<?php

namespace App\Actions;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Product;
use App\Http\Resources\ProductResource;
use Lorisleiva\Actions\Concerns\AsAction;

class ProductsViaSearch
{
  use AsAction, ApiResponser;

  public function asController(Request $request)
  {
    // return $this->successResponse(ProductResource::collection(Product::where([
    //   ['front_end_search_keyword', 'like', '%' . $request->search . '%'], ['status', '=', 1], ['is_allowed_country', '=', (!getCurrentLocation()->isIndia) ? false : true]
    // ])
    return $this->successResponse(ProductResource::collection(Product::where([
      ['front_end_search_keyword', 'like', '%' . $request->search . '%'], ['status', '=', 1]
    ])
      ->select('name', 'sku', 'uuid', 'price_unit', 'id', 'slug')
      ->groupBy('sku')
      ->orderBy('price_unit')
      ->limit(30)
      ->with('images', 'mappedCategories', 'brand')->get()));
  }
}
