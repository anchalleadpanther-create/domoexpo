<?php

namespace App\Http\Controllers\Customer;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Product;
use Illuminate\Http\JsonResponse;
use App\Models\Ecommerce\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use App\Actions\Customer\ProductFilter;
use App\View\Components\Customer\Products\ProductCard;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Customer\CategoryProductsRepository;

class CategoryProductController extends Controller
{
  public function __construct(private CategoryProductsRepository $CategoryProductsRepository)
  {
  }

  public function products(string $categorySlug) 
  // : View|JsonResponse
  {
    try {
      $category = Category::where('category_slug', $categorySlug)->firstOrFail();
       $categoryId = $category->id;

      // $products = Product::where([['status', '=', 1]])
      //   ->orderByDesc('created_at')
      //   ->whereHas('mappedCategories', function ($q) use ($categoryId) {
      //     $q->whereIn('category_id', [$categoryId]);
      //   });

      // if (!getCurrentLocation()->isIndia) {
      //   $products = $products->where('is_allowed_country', '=', false);
      // }

      // $products = $products->join('cpr_product_mapped_categories', 'cpr_products.id', '=', 'cpr_product_mapped_categories.product_id')
      //           ->where('cpr_product_mapped_categories.category_id', $categoryId)
      //           ->orderBy('cpr_product_mapped_categories.sort', 'desc');


      //  $products = $products
      //   ->groupBy('sku')
      //   ->with(['mappedCategories', 'images'])
      //   ->paginate(20);


    $products = Product::where('status', 1)
    ->whereHas('mappedCategories', function ($q) use ($categoryId) {
        $q->where('category_id', $categoryId);
    });

    $products = $products->join('cpr_product_mapped_categories', 'cpr_products.id', '=', 'cpr_product_mapped_categories.product_id')
                ->where('cpr_product_mapped_categories.category_id', $categoryId)
                ->orderBy('cpr_product_mapped_categories.sort', 'desc');


     $products = $products->groupBy(['cpr_products.sku', 'cpr_products.type_value_id_1'])
                ->select('cpr_products.*')
                ->with(['mappedCategories', 'images'])
                ->paginate(20);

      if (request()->wantsJson()) {
        $productsTemplate = [];
        foreach ($products as $product) {
          $productsTemplate[] = Blade::renderComponent(new ProductCard($product, true, true));
        }

         $nextPageUrl = $products?->nextPageUrl() ?? '';
        $hasPages = isset($nextPageUrl) ? true : false;

        return $this->successResponse(compact('productsTemplate', 'hasPages', 'nextPageUrl'), 'Products fetched successfully');
      }
// return $products;
      return view('customer.product.products', compact('products', 'category'));
    } catch (ModelNotFoundException $th) {
      abort(404);
    } catch (\Throwable $th) {
      dd($th);
    }
  }

  public function productsFilteredAjax(Request $request): JsonResponse
  {
    try {
      $category = Category::where('category_slug', $request->categorySlug)->firstOrFail();
      $response = ProductFilter::run($category->id, $request);
      $products = $response['products'];
      $productsCount = $response['productsCount'];

      $productsTemplate = [];
      $path = asset('uploads/products') . '/';
      $loggedIn = Auth::guard('buyer')->check();
      $nextPageUrl = '';

      $countryID = session()->exists('countryId') ? getCurrentCurrency(session('countryId'))->currency  : '101';
      foreach ($products as $product) {
        $productsTemplate[] = Blade::renderComponent(new ProductCard($product, true, true, getCurrentCurrency($countryID)));
      }

      $nextPageUrl = $products->nextPageUrl();
      $hasPages = isset($nextPageUrl) ? true : false;

      return $this->successResponse(compact('path', 'loggedIn', 'productsTemplate', 'nextPageUrl', 'hasPages', 'productsCount','response'), 'Products fetched successfully');
    } catch (\Throwable $th) {
      return $this->errorResponse($th->getMessage(), 500);
    }
  }

  public function productsFiltered(Request $request): View
  {
    try {
      $category = Category::where('category_slug', $request->categorySlug)->firstOrFail();
      $categoryId = $category->id;

      $response = ProductFilter::run($categoryId, $request);
      $products = $response['products'];
      $productsCount = $response['productsCount'];
      $productIds = $products->pluck('id')->toArray();

      if (isset($category->parent->parent->parent_id)) {
        $categoryId = $category->parent->parent->parent_id;
      }

      if (isset($category->parent->parent_id)) {
        $categoryId = $category->parent->parent_id;
      }

      $path = asset('uploads/products') . '/';

      return view('customer.product.products', compact('response','products', 'category', 'path', 'productsCount'));
    } catch (\Throwable $th) {
      return dd($th->getMessage());
    }
  }


}
