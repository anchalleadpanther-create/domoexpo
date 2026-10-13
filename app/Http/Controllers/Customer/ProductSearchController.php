<?php

namespace App\Http\Controllers\Customer;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use App\Actions\Customer\ProductFilterBySearch;
use App\View\Components\Customer\Products\ProductCard;
use App\Repositories\Customer\CategoryProductsRepository;

class ProductSearchController extends Controller
{
  public function __construct(private CategoryProductsRepository $CategoryProductsRepository)
  {
  }

  public function products(Request $request)
  // : View | JsonResponse
  {
    try {
      $response = $this->CategoryProductsRepository->getSearchProducts($request);
      $products = $response['products'];

      if (request()->wantsJson()) {
        $productsTemplate = [];
        foreach ($products as $product) {
          $productsTemplate[] = Blade::renderComponent(new ProductCard($product, true,true));
        }

        $nextPageUrl = $products?->nextPageUrl() ?? '';
        $hasPages = isset($nextPageUrl) ? true : false;

        return $this->successResponse(compact('productsTemplate', 'hasPages', 'nextPageUrl'), 'Products fetched successfully');
      }

      return view('customer.product.search-products', compact('products'));
    } catch (\Throwable $th) {
      dd($th);
    }
  }

  public function productsFilteredAjax(Request $request): JsonResponse
  {
    try {
      $response = ProductFilterBySearch::run($request);
      $products = $response['products'];
      $productsCount = $response['productsCount'];

      $productsTemplate = [];
      $path = asset('uploads/products') . '/';
      $loggedIn = Auth::guard('buyer')->check();
      $nextPageUrl = '';

      foreach ($products as $product) {
        $productsTemplate[] = Blade::renderComponent(new ProductCard($product, true,true));
      }

      $nextPageUrl = $products->nextPageUrl();
      $hasPages = isset($nextPageUrl) ? true : false;

      return $this->successResponse(compact('path', 'loggedIn', 'productsTemplate', 'nextPageUrl', 'hasPages', 'productsCount'), 'Products fetched successfully');
    } catch (\Throwable $th) {
      dd($th);
      return $this->errorResponse($th->getMessage(), 500);
    }
  }

  public function productsFiltered(Request $request)
  {
    try {
      $response = ProductFilterBySearch::run($request);
      $products = $response['products'];
      $productsCount = $response['productsCount'];

      $path = asset('copro/public/uploads/products') . '/';
      $loggedIn = Auth::guard('buyer')->check();

      return view('customer.product.search-products', compact('products', 'productsCount'));
    } catch (\Throwable $th) {
      dd($th);
    }
  }
}
