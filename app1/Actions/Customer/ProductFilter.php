<?php

namespace App\Actions\Customer;

use Illuminate\Support\Str;
use App\Models\Ecommerce\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class ProductFilter
{
    use AsAction;

    public function handle($categoryId, $request)
    {
        $products = Product::where('status', 1)
            ->groupBy('sku');

        if (isset($request->minimumPrice) && isset($request->maximumPrice)) {
            $products->whereBetween('price_unit', [$request->minimumPrice, $request->maximumPrice]);
        }

        if (isset($request->colors)) {
            $products->whereIn('type_value_id_1', $request->colors);
        }

        if (isset($request->sizes)) {
            $products->whereIn('type_value_id_2', $request->sizes);
        }

        if (isset($request->brands)) {
            $products->whereIn('brand_id', $request->brands);
        }

        if (isset($request->occasion) && count($request->occasion) > 0) {
            $products->where(function($query) use ($request) {
                foreach ($request->occasion as $occasion) {
                    $query->orWhere('occasion', 'LIKE', '%' . $occasion . '%');
                }
            });
        }

        if (isset($request->availability)) {
            $products->whereIn('availability', $request->availability);
        }

        if (isset($request->material)) {
            $products->whereIn('material', $request->material);
        }

        $firstEle = null;
        $lastEle = null;

        if (isset($request->discountRange) && count($request->discountRange) > 0) {
            if ($request->has('discountRange') && is_array($request->discountRange)) {
                $discountRange = $request->discountRange;
                $minPrice = reset($discountRange);
                $maxPrice = end($discountRange);

                $products->when($minPrice && $maxPrice, function ($query) use ($minPrice, $maxPrice) {
                    return $query->whereBetween('discount', [$minPrice, $maxPrice]);
                })
                ->when($minPrice && !$maxPrice, function ($query) use ($minPrice) {
                    return $query->where('discount', '>=', $minPrice);
                })
                ->when(!$minPrice && $maxPrice, function ($query) use ($maxPrice) {
                    return $query->where('discount', '<=', $maxPrice);
                });
            }
        }

        if (isset($request->gender) && is_array($request->gender)) {
            $products->where(function ($query) use ($request) {
                foreach ($request->gender as $gender) {
                    $query->orWhereRaw("FIND_IN_SET(?, gender)", [$gender]);
                }
            });
        }

        if (!getCurrentLocation()->isIndia) {
            $products->where('is_allowed_country', false);
        }

        if (isset($request->sortType)) {
            $products->orderBy(Str::before($request->sortType, '-'), Str::after($request->sortType, '-'));
        } else {
            $products->orderByDesc('sort')
                ->orderByDesc('created_at');
        }

        if (isset($request->categories)) {
            $productsCount = $products->whereHas('mappedCategories', function ($query) use ($request) {
                $categories = array_map('intval', $request->categories);
                $query->whereIn('category_id', $categories);
            });

            $productsCount = $products->whereHas('mappedCategories', function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            })->count();

            $products = $products->whereHas('mappedCategories', function ($query) use ($request) {
                $categories = array_map('intval', $request->categories);
                $query->whereIn('category_id', $categories);
            });

            $products = $products->whereHas('mappedCategories', function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            })->with(['images', 'inMyWishlist', 'mappedCategories'])
            ->paginate(20)
            ->appends(request()->query());
        } else {
            $productsCount = $products->whereHas('mappedCategories', function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            })->count();

            $products = $products->whereHas('mappedCategories', function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            })->with(['images', 'inMyWishlist', 'mappedCategories'])
            ->paginate(20)
            ->appends(request()->query());
        }

        return compact('products', 'productsCount', 'firstEle', 'lastEle');
    }
}
