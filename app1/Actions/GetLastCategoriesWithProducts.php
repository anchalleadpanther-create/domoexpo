<?php

namespace App\Actions;

use App\Models\Ecommerce\Category;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Ecommerce\ProductMappedCategory;

class GetLastCategoriesWithProducts
{
  use AsAction;

  public function handle(array $productIds): Collection
  {
    $categoryIds = ProductMappedCategory::whereIn('product_id', $productIds)->pluck('category_id')->toArray();
    $categories = Category::whereIn('id', array_unique($categoryIds))->where([['status', '=', 1], ['parent_id', '!=', 0]])->get();
    return $categories;
    // return Category::where([['status', '=', 1], ['parent_id', '!=', 0], ['is_allowed_country', '=', (!getCurrentLocation()->isIndia) ? false : true]])
    //   ->whereHas('mappedProducts', function ($query) use ($productIds) {
    //     return $query->whereIn('cpr_products.id', $productIds);
    //   })
    // ->get();
  }
}
