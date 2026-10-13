<?php

namespace App\Http\Controllers\Customer\Designer;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Brand;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Builder;
use App\Actions\Customer\ProductFilterByBrand;
use App\View\Components\Customer\Products\ProductCard;
use App\Repositories\Customer\CategoryProductsRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DesignerController extends Controller
{
  use ApiResponser;

  public function __construct(private CategoryProductsRepository $CategoryProductsRepository)
  {
  }

  public function designers(string $letter = NULL): View|JsonResponse
  {
    $brandsCount = Brand::where('status', '=', 1);
    $brandCategories = array_unique(Arr::flatten(Brand::pluck('categories')));

    $brandsOne = Brand::where('status', 1);
    $brandsTwo = Brand::where('status', 1);
    $brandsThree = Brand::where('status', 1);
    $brandsFour = Brand::where('status', 1);

    if (!getCurrentLocation()->isIndia) {
      $brandsCount = $brandsCount->where('is_allowed_country', '=', false);
      $brandsOne =  $brandsOne->where('is_allowed_country', '=', false);
      $brandsTwo =  $brandsTwo->where('is_allowed_country', '=', false);
      $brandsThree =  $brandsThree->where('is_allowed_country', '=', false);
      $brandsFour =  $brandsFour->where('is_allowed_country', '=', false);
    }

    if ($letter === 'new-in-designers') {
      $brandsCount = $brandsCount->whereBetween('created_at', [Carbon::today()->subdays(15), Carbon::now()]);
      $brandsOne =  $brandsOne->whereBetween('created_at', [Carbon::today()->subdays(15), Carbon::now()]);
      $brandsTwo =  $brandsTwo->whereBetween('created_at', [Carbon::today()->subdays(15), Carbon::now()]);
      $brandsThree =  $brandsThree->whereBetween('created_at', [Carbon::today()->subdays(15), Carbon::now()]);
      $brandsFour =  $brandsFour->whereBetween('created_at', [Carbon::today()->subdays(15), Carbon::now()]);
    }

    if ($letter === 'new-this-week') {
      $brandsCount = $brandsCount->whereHas('latestProduct', function (Builder $query) {
        $query->where('created_at', '>=', Carbon::today()->subdays(7));
      });
      $brandsOne =  $brandsOne->whereHas('latestProduct', function (Builder $query) {
        $query->where('created_at', '>=', Carbon::today()->subdays(7));
      });
      $brandsTwo =  $brandsTwo->whereHas('latestProduct', function (Builder $query) {
        $query->where('created_at', '>=', Carbon::today()->subdays(7));
      });
      $brandsThree =  $brandsThree->whereHas('latestProduct', function (Builder $query) {
        $query->where('created_at', '>=', Carbon::today()->subdays(7));
      });
      $brandsFour =  $brandsFour->whereHas('latestProduct', function (Builder $query) {
        $query->where('created_at', '>=', Carbon::today()->subdays(7));
      });
    }

    $brandsCount = $brandsCount->count();
    ($brandsCount > 4) ? $limit = (int)ceil($brandsCount / 4) : $limit = 1;

    $brandsOne = $brandsOne->limit($limit)->orderBy('brand_name')->get();
    $brandsTwo = $brandsTwo->limit($limit)->offset($limit)->orderBy('brand_name')->get();
    $brandsThree = $brandsThree->limit($limit)->offset($limit + $limit)->orderBy('brand_name')->get();
    $brandsFour = $brandsFour->limit($limit)->offset($limit + $limit + $limit)->orderBy('brand_name')->get();

    return view('customer.designers.designers', compact('brandsOne', 'brandsTwo', 'brandsThree', 'brandsFour', 'brandCategories'));
  }

  public function filterDesignersViaCategorySearchAndPreference(): View|JsonResponse
  {
    $brandsCount = Brand::where('status', '=', 1);
    $brandsOne = Brand::where('status', '=', 1);
    $brandsTwo = Brand::where('status', '=', 1);
    $brandsThree = Brand::where('status', '=', 1);
    $brandsFour = Brand::where('status', '=', 1);

    if (!getCurrentLocation()->isIndia) {
      $brandsCount = $brandsCount->where('is_allowed_country', '=', false);
      $brandsOne =  $brandsOne->where('is_allowed_country', '=', false);
      $brandsTwo =  $brandsTwo->where('is_allowed_country', '=', false);
      $brandsThree =  $brandsThree->where('is_allowed_country', '=', false);
      $brandsFour =  $brandsFour->where('is_allowed_country', '=', false);
    }

    if (isset(request()->letter)) {
      $letter = request()->letter;
      $brandsCount = $brandsCount->where('brand_name', 'like', "{$letter}%");
      $brandsOne = $brandsOne->where('brand_name', 'like', "{$letter}%");
      $brandsTwo = $brandsTwo->where('brand_name', 'like', "{$letter}%");
      $brandsThree = $brandsThree->where('brand_name', 'like', "{$letter}%");
      $brandsFour = $brandsFour->where('brand_name', 'like', "{$letter}%");
    }

    if (isset(request()->category) && request()->category !== 'all') {
      $brandsCount = $brandsCount->whereJsonContains('categories', request()->category);
      $brandsOne = $brandsOne->whereJsonContains('categories', request()->category);
      $brandsTwo = $brandsTwo->whereJsonContains('categories', request()->category);
      $brandsThree = $brandsThree->whereJsonContains('categories', request()->category);
      $brandsFour = $brandsFour->whereJsonContains('categories', request()->category);
    }

    if (isset(request()->search)) {
      $search = request()->search;
      $brandsCount = $brandsCount->where('brand_name', 'like', "{$search}%");
      $brandsOne = $brandsOne->where('brand_name', 'like', "{$search}%");
      $brandsTwo = $brandsTwo->where('brand_name', 'like', "{$search}%");
      $brandsThree = $brandsThree->where('brand_name', 'like', "{$search}%");
      $brandsFour = $brandsFour->where('brand_name', 'like', "{$search}%");
    }

    $brandsCount = $brandsCount->count();
    ($brandsCount > 4) ? $limit = (int)ceil($brandsCount / 4) : $limit = 1;

    $brandsOne = $brandsOne->limit($limit)->orderBy('brand_name')->get()->load('inMyWishlist');

    $brandsTwo = $brandsTwo->limit($limit)->offset($limit)->orderBy('brand_name')->get()->load('inMyWishlist');

    $brandsThree = $brandsThree->limit($limit)->offset($limit + $limit)->orderBy('brand_name')->get()->load('inMyWishlist');

    $brandsFour = $brandsFour->limit($limit)->offset($limit + $limit + $limit)->orderBy('brand_name')->get()->load('inMyWishlist');

    $auth = Auth::guard('buyer')->user();
    return $this->successResponse(compact('brandsOne', 'brandsTwo', 'brandsThree', 'brandsFour', 'auth', 'brandsCount'));
  }

  public function products(string $brandSlug): View | JsonResponse
  {
    try {
      $brand = Brand::where('brand_slug', $brandSlug)->firstOrFail();

      $response = $this->CategoryProductsRepository->getBrandProducts($brand->id);
      $products = $response['products'];

      if (request()->wantsJson()) {
        $productsTemplate = [];
        foreach ($products as $product)
          $productsTemplate[] = Blade::renderComponent(new ProductCard($product, true));

        $nextPageUrl = $products?->nextPageUrl() ?? '';
        $hasPages = isset($nextPageUrl) ? true : false;

        return $this->successResponse(compact('productsTemplate', 'hasPages', 'nextPageUrl'), 'Products fetched successfully');
      }

      return view('customer.product.designer-products', compact('products', 'brand'));
    } catch (ModelNotFoundException) {
      abort(404);
    } catch (\Throwable $th) {
    }
  }

  public function productsFilteredAjax(Request $request): JsonResponse
  {
    try {
      $brand = Brand::where('brand_slug', $request->brandSlug)->firstOrFail();
      $response = ProductFilterByBrand::run($brand->id, $request);

      $products = $response['products'];
      $productsCount = $response['productsCount'];

      $path = asset('uploads/products') . '/';
      $loggedIn = Auth::guard('buyer')->check();

      $productsTemplate = [];
      foreach ($products as $product)
        $productsTemplate[] =  Blade::renderComponent(new ProductCard($product, true));

      $nextPageUrl = $products?->nextPageUrl() ?? '';
      $hasPages = isset($nextPageUrl) ? true : false;

      return $this->successResponse(compact('brand', 'path', 'loggedIn', 'productsTemplate', 'nextPageUrl', 'hasPages', 'productsCount'), 'Products fetched successfully');
    } catch (\Throwable $th) {
      return $this->errorResponse($th->getMessage(), 500);
    }
  }

  public function productsFiltered(Request $request): View
  {
    try {
      $brand = Brand::where('brand_slug', $request->brandSlug)->firstOrFail();

      $response = ProductFilterByBrand::run($brand->id, $request);

      $products = $response['products'];
      $productsCount = $response['productsCount'];

      $path = asset('uploads/products') . '/';
      $loggedIn = Auth::guard('buyer')->check();

      return view('customer.product.designer-products', compact('products', 'brand', 'productsCount'));
    } catch (\Throwable $th) {
      return back()->withErrors($th->getMessage());
    }
  }
}
