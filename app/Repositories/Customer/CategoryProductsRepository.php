<?php

namespace App\Repositories\Customer;

use Carbon\Carbon;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Filter;
use App\Models\Ecommerce\Product;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryProductsRepository extends BaseRepository
{
  /* 
    These functions get product for the category page
  */

  public function getCategoryProducts($categoryId, $limit = null, $productId = null, bool $paginate = false): object
  {
    $products = Product::orderByDesc('sort')->orderByDesc('created_at')->where([
      ['status', '=', 1],
    ])
      ->groupBy('sku');

    if (isset($limit))
      $products->limit($limit);
    if ($productId)
      $products->where('id', '!=', $productId);

    $products = $products->whereHas('mappedCategories', function ($q) use ($categoryId) {
      $q->where('category_id', '=', $categoryId);
    });
    return $paginate ? $products->cursorPaginate(12) : $products->get();
  }

  public function getBrandProducts($brandId): array
  {
    $products = Product::where([
      ['status', '=', 1],
    ])
      ->orderByDesc('sort')
      ->orderByDesc('created_at')
      ->has('mappedCategories');

    if (!getCurrentLocation()->isIndia)
      $products = $products->where('is_allowed_country', '=', false);

    $productsCount = Product::orderByDesc('sort')
      ->orderByDesc('created_at')
      ->where([
        ['status', '=', 1],
      ])->has('mappedCategories');

    if (!getCurrentLocation()->isIndia) {
      $products = $products->where('is_allowed_country', '=', false);
      $productsCount = $productsCount->where('is_allowed_country', '=', false);
    }

    $products = $products->groupBy('sku')
      ->where('brand_id', '=', $brandId)
      ->paginate(20)
      ->appends(request()->query());

    $productsCount = $productsCount->groupBy('sku')
      ->where('brand_id', '=', $brandId)
      ->get()
      ->count();

    return compact('products', 'productsCount');
  }

  public function getSearchProducts($request): array
  {
    $where = [['front_end_search_keyword', 'like', '%' . $request->search . '%'], ['status', '=', 1]];

    $products = Product::orderByDesc('created_at')->where($where)->has('mappedCategories');
    $productsCount = Product::orderByDesc('created_at')->where($where)->has('mappedCategories');

    if (isset($request->type) && $request->type === 'new-collections') {
      $products = $products->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()]);
      $productsCount = $productsCount->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()]);
    }

    if (isset($request->type) && $request->type === 'new-this-month') {
      $products = $products->whereBetween('created_at', [Carbon::now()->subDays(15), Carbon::now()]);
      $productsCount = $productsCount->whereBetween('created_at', [Carbon::now()->subDays(15), Carbon::now()]);
    }

    if (!getCurrentLocation()->isIndia) {
      $products = $products->where('is_allowed_country', '=', false);
      $productsCount = $productsCount->where('is_allowed_country', '=', false);
    }

    $products = $products->with(['mappedCategories', 'images'])->groupBy('sku')
      ->paginate(20)
      ->appends(request()->query());

    $productsCount = $productsCount->groupBy('sku')
      ->get()
      ->count();

    return compact('products', 'productsCount');
  }

  public function allProducts(int $brandId = null, int $categoryId = null, $request = null): Collection
  {
    $products = Product::orderByDesc('id')->where([
      ['status', '=', 1],
    ])
      ->select('id', 'parent_id', 'sku', 'type_value_id_1', 'type_value_id_2', 'occasion', 'availability', 'material', 'price_unit', 'brand_id', 'gender', 'discount');

    if (isset($brandId))
      $products = $products->where('brand_id', '=', $brandId);

    if (isset($categoryId))
      $products = $products->whereHas('mappedCategories', function ($q) use ($categoryId) {
        $q->where('category_id', $categoryId);
      });

    if (isset($request->search))
      $products = $products->where('front_end_search_keyword', 'like', '%' . $request->search . '%');

    if (isset($request->type) && $request->type === 'new-this-week')
      $products = $products->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()]);

    if (isset($request->type) && $request->type === 'new-this-month')
      $products = $products->whereBetween('created_at', [Carbon::now()->subDays(15), Carbon::now()]);

    if (isset($request->type) && $request->type === 'new-collections')
      $products = $products->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()]);

    if (!getCurrentLocation()->isIndia)
      $products = $products->where('is_allowed_country', '=', false);

    // if (isset($categoryId)) {
    //   $products = $products->get();
    //   // $products = $products->whereHas('mappedCategories', function ($q) use ($categoryId) {
    //   //   $q->where('category_id', $categoryId);
    //   // });
    // }

    return $products->get();
  }

  public function getCategoryFilters($categoryId): object
  {
    return Filter::where([
      ['status', '=', 1]
    ])->whereHas('mappedCategories', function ($q) use ($categoryId) {
      $q->where('category_id', '=', $categoryId);
    })
      ->orderBy('sort')
      ->get();
  }

  public function getParentCategory($category): int
  {
    $parentCategoryId = $category->id;
    if (isset($category->parent)) {
      $parentCategoryId = $category->parent->id;
      if (isset($category->parent->parent)) {
        $parentCategoryId = $category->parent->parent->id;
      }
    }
    return $parentCategoryId;
  }

  public function getCategoryBrands(array $brandIds = []): object
  {
    return Brand::where('status', '=', 1)
      ->whereIn('id', $brandIds)
      ->orderBy('brand_name')
      ->select('id', 'brand_name')
      ->get();
  }

  public function getMinAndMaxPrice($products, bool $paginate = false): array
  {
    $maxPrice = $minPrice = NULL;
    if (!$products->isEmpty() && !$paginate) {
      $maxPrice = max(array_column($products->toArray(), 'price_unit'));
      $minPrice = min(array_column($products->toArray(), 'price_unit'));
    } else if (!$products->isEmpty() && $paginate) {
      $maxPrice = max(array_column($products->toArray()['data'], 'price_unit'));
      $minPrice = min(array_column($products->toArray()['data'], 'price_unit'));
    }
    return compact('maxPrice', 'minPrice');
  }

  // this function gets the product detail depending upon its uuid
  public function productDetail(string $uuid): object
  {
    return Product::where([['uuid', $uuid], ['status', '=', 1]])->firstOrFail();
  }

  public function increaseViewCount(string $uuid)
  {
    return Product::where('uuid', $uuid)->increment('view_count');
  }

  public function relatedProducts($product)
  // : object
  {
  //  return  $product->mappedCategoriesUntouched->last()->id;
    if ($product->parent_id === 0) {
      return $this->getCategoryProducts($product->mappedCategoriesUntouched->last()->id, 25, ($product->parent_id != 0) ? $product->parent_id : $product->id);
    } else {
      return $this->getCategoryProducts($product->parentProduct->mappedCategoriesUntouched->last()->id, 25, ($product->parent_id != 0) ? $product->parent_id : $product->id);
    }

  }

  public function completeTheLookProducts($categoryIds)
{
    // Ensure only active products with a valid status
    $products = Product::where('status', 1)
        // ->orderByDesc('sort')
        // ->orderByDesc('created_at')
        ->whereHas('mappedCategories', function ($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        })
        // ->groupBy('sku')
        // ->inRandomOrder()
        ->limit(50)
        ->get();

    return $products;
}


  public function notRelatedBrandProducts($product)
  // : Collection
  {
    $categoryId = $product->mappedCategoriesNotInExtraCat->where('parent_id','!=', 0)->first()->id ?? "";
  //  $categoryId = 151;//$product->mappedCategories()->first()->category_id;
   $products = Product::where([
      ['status', '=', 1],
    ])->orderByDesc('sort')->orderByDesc('created_at')->has('mappedCategories')->groupBy('sku')->where('brand_id', '!=', $product->brand_id);

    $products = $products->whereHas('mappedCategories', function ($q) use ($categoryId) {
      $q->where('category_id', '=', $categoryId);
    });
    return $products =   $products->inRandomOrder()->limit(50)->get();
  }
  public function relatedBrandProducts($product): Collection
  {
    return Product::where([
      ['status', '=', 1],
    ])
      ->orderByDesc('sort')
      ->orderByDesc('created_at')
      ->has('mappedCategories')
      ->groupBy('sku')
      ->where('brand_id', '=', $product->brand_id)
      ->inRandomOrder()->limit(50)->get();
  }
 
  // This function gets the product type values for the product detail page which are mapped with the product.
  public function getProductTypeValues(Product $product): array
  {
    $firstType = Product::where('parent_id', '=', ($product->parent_id != 0 ? $product->parent_id : $product->id))
      ->orWhere('id', ($product->parent_id != 0) ? $product->parent_id : $product->id)
      ->groupBy('type_value_id_1')
      ->get();

    $sizesOfFirstType = Product::where([
      ['parent_id', '=', ($product->parent_id != 0 ? $product->parent_id : $product->id)], ['type_value_id_1', '=', $product->type_value_id_1]
    ])
      ->orWhere([
        ['id', ($product->parent_id != 0) ? $product->parent_id : $product->id], ['type_value_id_1', '=', $product->type_value_id_1]
      ])
      ->get();
    return compact('firstType', 'sizesOfFirstType');
  }





 public function saveContentProgress(Request $request)
    {
        try {
            $rules = [
                'content_id' => ['required', 'exists:App\Models\Content,id'],
                'user_id' => ['required', 'exists:App\Models\Child,id'],
                'access_content_count' => ['required', 'integer'],
            ];
            
            $check_validate = Validator::make($request->all(), $rules);
            if ($check_validate->fails()) {
                return $this->errorResponse([], $check_validate->errors()->first(), 422); // Change to 422 for validation errors
            }
    
          
            return $this->successResponse([], 'Data saved successfully!', 200); //Custom method 
        } catch (\Exception $e) {
            return $this->errorResponse([], 'Message: ' . $e->getMessage() . ', Line no.: ' . $e->getLine(), 500);
        }
    }













}
