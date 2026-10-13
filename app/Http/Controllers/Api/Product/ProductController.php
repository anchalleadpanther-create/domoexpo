<?php

namespace App\Http\Controllers\Api\Product;

use App\Models\Customer\Rating;
use App\Models\Ecommerce\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ApiController;
use App\Repositories\Customer\CategoryProductsRepository;

class ProductController extends ApiController
{

  protected $CategoryProductsRepository;

  public function __construct(CategoryProductsRepository $CategoryProductsRepository)
  {
    $this->CategoryProductsRepository = $CategoryProductsRepository;
  }

  public function getProductByCategory(int $categoryId): object
  {
    $products = $this->CategoryProductsRepository->getCategoryProducts($categoryId);
    $filters = $this->CategoryProductsRepository->getCategoryFilters($categoryId);
    return $this->successResponse(compact('products', 'filters'));
  }


  public function getProductDetails(int $productId, int $typeOneId = null, int $typeTwoId = null)
  {
    $product = $this->CategoryProductsRepository->productDetail($productId, $typeOneId, $typeTwoId);

    $productTypeValues = ($product->have_options) ? $this->CategoryProductsRepository->getProductTypeValues(($product->parent_id === 0) ?

      $productId : $product->parent_id, $typeOneId) : null;

    $images = Product::find($product->id)->images;

    $relatedProducts = $this->CategoryProductsRepository->relatedProducts($product);

    $haveIRated = (Auth::guard('buyer')->check()) ? Rating::where([
      ['product_id', '=', $productId], ['type', '=', 'product'], ['user_id', '=', Auth::guard('buyer')->user()->id]
    ])->exists() : false;

    return $this->successResponse(compact('product', 'productTypeValues', 'images', 'relatedProducts', 'haveIRated'));
  }

  public function getAllProducts()
  {
    return $this->successResponse(Product::where([['status', 1]])->get());
  }
}
