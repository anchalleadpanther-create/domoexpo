<?php

namespace App\Actions\Customer;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Ecommerce\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class ProductFilterBySearch
{
  use AsAction;

  public function handle($request): array
  {
    $products = Product::where([
      ['status', '=', 1],
    ])
      ->has('mappedCategories')
      ->groupBy('sku');

    if (isset($request->type) && $request->type === 'new-collections')
      $products = $products->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()]);

    if (isset($request->minimumPrice) && isset($request->maximumPrice))
      $products = $products->whereBetween('price_unit', [$request->minimumPrice, $request->maximumPrice]);

    if (isset($request->colors))
      $products = $products->whereIn('type_value_id_1', $request->colors);

    if (isset($request->sizes))
      $products = $products->whereIn('type_value_id_2', $request->sizes);

    if (isset($request->brands))
      $products = $products->whereIn('brand_id', $request->brands);

    if (isset($request->occasion))
      $products = $products->whereIn('occasion', $request->occasion);

    if (isset($request->availability))
      $products = $products->whereIn('availability', $request->availability);

    if (isset($request->material))
      $products = $products->whereIn('material', $request->material);

    if (isset($request->gender))
      $products = $products->whereIn('gender', $request->gender);

    if (!getCurrentLocation()->isIndia)
      $products = $products->where('is_allowed_country', '=', false);

    if (isset($request->categories))
      $products = $products->whereHas('mappedCategories', function ($query) use ($request) {
        $categories = array_map(function ($category) {
          return (int) $category;
        }, $request->categories);
        $query->whereIn('category_id', $categories);
      });

    if (isset($request->sortType))
      $products = $products->orderBy(Str::before($request->sortType, '-'), Str::after($request->sortType, '-'));
    else
      $products = $products->orderByDesc('created_at');

    $productsCount = $products->where('front_end_search_keyword', 'like', '%' . $request->search . '%')
      ->get()
      ->count();

    $products = $products->where('front_end_search_keyword', 'like', '%' . $request->search . '%')
      ->with('images', 'inMyWishlist', 'mappedCategories', 'brand')
      ->paginate(18)
      ->appends(request()->query());

    return compact('products', 'productsCount');
  }
}
