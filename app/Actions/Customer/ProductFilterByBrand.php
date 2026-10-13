<?php

namespace App\Actions\Customer;

use Illuminate\Support\Str;
use App\Models\Ecommerce\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class ProductFilterByBrand
{
    use AsAction;

    // public function handle($brandId, $request): array
    // {
    //     $products = Product::where('status', 1)
    //         ->groupBy('sku')
    //         ->has('mappedCategories');

    //     if (!getCurrentLocation()->isIndia) {
    //         $products->where('is_allowed_country', false);
    //     }

    //     if (isset($request->minimumPrice) && isset($request->maximumPrice)) {
    //         $products->whereBetween('price_unit', [$request->minimumPrice, $request->maximumPrice]);
    //     }

    //     if (isset($request->colors)) {
    //         $products->whereIn('type_value_id_1', $request->colors);
    //     }

    //     if (isset($request->sizes)) {
    //         $products->whereIn('type_value_id_2', $request->sizes);
    //     }

    //     if (isset($request->brands)) {
    //         $products->whereIn('brand_id', $request->brands);
    //     }

    //     if (isset($request->occasion) && count($request->occasion) > 0) {
    //         $products->where(function($query) use ($request) {
    //             foreach ($request->occasion as $occasion) {
    //                 $query->orWhere('occasion', 'LIKE', '%' . $occasion . '%');
    //             }
    //         });
    //     }

    //     if (isset($request->availability)) {
    //         $products->whereIn('availability', $request->availability);
    //     }

    //     if (isset($request->material)) {
    //         $products->whereIn('material', $request->material);
    //     }

    //     if (isset($request->gender)) {
    //         $products->whereIn('gender', $request->gender);
    //     }

    //     if (isset($request->categories)) {
    //         $products->whereHas('mappedCategories', function($query) use ($request) {
    //             $categories = array_map('intval', $request->categories);
    //             $query->whereIn('category_id', $categories);
    //         });
    //     }

    //     if (isset($request->sortType)) {
    //         $products->orderBy(Str::before($request->sortType, '-'), Str::after($request->sortType, '-'));
    //     } else {
    //         $products->orderByDesc('sort')->orderByDesc('created_at');
    //     }

    //     // Clone the query before adding pagination and additional relationships
    //     $productsClone = clone $products;

    //     // Get the correct product count for the specified brand
    //     $productsCount = 10;//$productsClone->where('brand_id', $brandId)->count();

    //     // Add brand-specific filter and relationships for the paginated result
    //     $products = $products
    //         ->where('brand_id', $brandId)
    //         ->with('images', 'inMyWishlist', 'mappedCategories', 'brand')
    //         ->paginate(20)
    //         ->appends(request()->query());

    //     return compact('products', 'productsCount');
    // }


public function handle($brandId, $request): array
{
    // Start building the query
    $query = Product::where('status', 1)
        ->groupBy('sku');

    // Apply filters
    if (isset($request->minimumPrice) && isset($request->maximumPrice)) {
        $query->whereBetween('price_unit', [$request->minimumPrice, $request->maximumPrice]);
    }

    if (isset($request->colors)) {
        $query->whereIn('type_value_id_1', $request->colors);
    }

    if (isset($request->sizes)) {
        $query->whereIn('type_value_id_2', $request->sizes);
    }

    if (isset($request->brands)) {
        $query->whereIn('brand_id', $request->brands);
    }

    if (isset($request->occasion) && count($request->occasion) > 0) {
        $query->where(function($subQuery) use ($request) {
            foreach ($request->occasion as $occasion) {
                $subQuery->orWhere('occasion', 'LIKE', '%' . $occasion . '%');
            }
        });
    }

    if (isset($request->availability)) {
        $query->whereIn('availability', $request->availability);
    }

    if (isset($request->material)) {
        $query->whereIn('material', $request->material);
    }

    if (isset($request->gender) && is_array($request->gender)) {
        $query->where(function ($subQuery) use ($request) {
            foreach ($request->gender as $gender) {
                $subQuery->orWhereRaw("FIND_IN_SET(?, gender)", [$gender]);
            }
        });
    }

    if (!getCurrentLocation()->isIndia) {
        $query->where('is_allowed_country', false);
    }

    if (isset($request->sortType)) {
        $query->orderBy(Str::before($request->sortType, '-'), Str::after($request->sortType, '-'));
    } else {
        $query->orderByDesc('sort')
            ->orderByDesc('created_at');
    }

    // Clone the query to get the product count
    $productsCountQuery = clone $query;
    $productsCount = $productsCountQuery->where('brand_id', $brandId)->get()->count();
//  $productsCount  = count($productsCount0);

    // Clone the query for pagination
    $productsQuery = clone $query;
    $products = $productsQuery->where('brand_id', $brandId)
        ->with(['images', 'inMyWishlist', 'mappedCategories'])
        ->paginate(20)
        ->appends(request()->query());

    // Get the SQL queries and bindings
    $productsCountSql = $productsCountQuery->toSql();
    $productsCountBindings = $productsCountQuery->getBindings();
    
    $productsSql = $productsQuery->toSql();
    $productsBindings = $productsQuery->getBindings();

    // Return the results along with the SQL queries and bindings for debugging
    return compact('products', 'productsCount', 'productsCountSql', 'productsCountBindings', 'productsSql', 'productsBindings');
}


}
