<?php

namespace App\Actions;

use App\Models\Ecommerce\Category;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Ecommerce\ProductMappedCategory;

class GetCategoriesOfProducts
{
  use AsAction;

  public function handle(array $productIds, $category = null): Collection
  {
    if (isset($category) && $category->is_last === 1)
      return collect([]);

    // $lastCategories = Category::whereIn('id', ProductMappedCategory::whereIn('product_id', $productIds)->pluck('category_id')->toArray())->where([
    //   ['is_last', '=', 0]
    // ])
    //   ->select('id', 'category_name', 'is_last')->groupBy('category_name')
    //   ->get();

    $lastCategories = Category::whereIn('id', ProductMappedCategory::whereIn('product_id', $productIds)->pluck('category_id')->toArray())
    ->where('is_last', 0)
    ->where('is_show_in_filter', 0)
    ->select('id', 'category_name', 'is_last','product_count')
    ->groupBy('category_name')
    ->leftJoinSub(
        ProductMappedCategory::selectRaw('category_id, COUNT(*) as product_count')
            ->whereIn('product_id', $productIds)
            ->groupBy('category_id'),
        'product_counts','cpr_categories.id','=','product_counts.category_id'
    )
    ->get();


    return $lastCategories;
  }
}
