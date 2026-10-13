<?php

namespace App\Actions\Customer;

use Illuminate\Support\Arr;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\ProductType;
use App\Actions\GetCategoriesOfProducts;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Ecommerce\ProductTypeValue;
use App\Actions\GetColorAndSizesForFilters;
use App\Actions\GetOccasionAvailabilityAndMaterial;
use App\Repositories\Customer\CategoryProductsRepository;

class GetProductFilters
{
  use AsAction, ApiResponser;

  public function __construct(private CategoryProductsRepository $CategoryProductsRepository)
  {
  }

  public function handle(Request $request)
  {
    $category = Category::where('category_slug', $request->categorySlug)->first();
    $brand = Brand::where('brand_slug', $request->brandSlug)->first();

    $allProducts = $this->CategoryProductsRepository->allProducts(brandId: $brand?->id, categoryId: $category?->id, request: request());
    $productsCount = count(array_unique(Arr::pluck($allProducts->toArray(), 'sku')));

    $productsParentIds = Arr::pluck($allProducts->where('parent_id', '=', 0), 'id');
    $productIds = Arr::pluck($allProducts->toArray(), 'id');
    $occasions = array_unique(Arr::pluck($allProducts->toArray(), 'occasion'));

    $p_occasions = [];
    $p_filter_occasions = [];

    foreach ($occasions as $occasion) {
        if (!empty($occasion)) {
            $new_occasions = explode(',', $occasion);
            foreach ($new_occasions as $n_occasion) {
                $trimmed_occasion = trim($n_occasion);
                if (!in_array(str_replace(" ", "", $trimmed_occasion), $p_filter_occasions)) {
                  if(!empty($trimmed_occasion))
                    $p_occasions[] = ['dropdown_value' => $trimmed_occasion];
                  
                    $p_filter_occasions[] = str_replace(" ", "", $trimmed_occasion);
                }
            }
        }
    }

//  return $p_occasions;


    $availability = array_unique(Arr::pluck($allProducts->toArray(), 'availability'));
    $material = array_unique(Arr::pluck($allProducts->toArray(), 'material'));
    $brandId = array_unique(Arr::pluck($allProducts->toArray(), 'brand_id'));

    // $genders = array_values(array_filter((array_unique(Arr::pluck($allProducts->toArray(), 'gender')))));
    $gendersArr = Arr::pluck($allProducts->toArray(), 'gender');
    $genders = collect($gendersArr)->flatMap(function ($item) {
      return explode(',', $item);
    })->map(function ($item) {
      return trim($item);
    })->filter()->unique()->values()->all();


    $typeIds = array_merge(array_unique(Arr::pluck($allProducts->toArray(), 'type_value_id_1')), array_unique(Arr::pluck($allProducts->toArray(), 'type_value_id_2')));

    $productTypes = ProductType::orderby('type')->whereIn('type', ['Color', 'Size'])->get();
    $productTypeValues = Arr::pluck(ProductTypeValue::whereIn('id', $typeIds)->orderBy('sort')->select('id')->get()->toArray(), 'id');

    $lastCategories = GetCategoriesOfProducts::run($productsParentIds, $category);
    $getColorsAndSizes = GetColorAndSizesForFilters::run($productIds, $typeIds, $productTypes, $productTypeValues);
    $colors = $getColorsAndSizes['colors'];
    $sizes = $getColorsAndSizes['sizes'];
    $getOccasionAvailabilityAndMaterial = GetOccasionAvailabilityAndMaterial::run($occasions, $availability, $material);

    $occasions = $p_occasions;//$getOccasionAvailabilityAndMaterial['occasions'];
    $availabilities = $getOccasionAvailabilityAndMaterial['availabilities'];
    $materials = $getOccasionAvailabilityAndMaterial['materials'];

    $brands = $this->CategoryProductsRepository->getCategoryBrands($brandId);
    $maxPrice = $this->CategoryProductsRepository->getMinAndMaxPrice($allProducts)['maxPrice'];
    $minPrice = $this->CategoryProductsRepository->getMinAndMaxPrice($allProducts)['minPrice'];

    $maxDiscount = round($allProducts->pluck('discount')->max());
    $maxDiscountLevel = min(floor(round($allProducts->pluck('discount')->max()) / 10), 10);

    return $this->successResponse(compact('productsCount', 'lastCategories', 'occasions', 'availabilities', 'materials', 'colors', 'sizes', 'brands', 'maxPrice', 'minPrice', 'genders', 'maxDiscountLevel'));
  }
}
