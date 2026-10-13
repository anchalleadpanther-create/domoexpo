<?php

namespace App\Repositories\Api\Product;

use App\Models\Ecommerce\Filter;
use App\Models\Ecommerce\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
  public function getProductsByCategory($categoryId): array
  {
    $products = Product::whereHas('mappedCategories', function ($q) use ($categoryId) {
      $q->where('category_id', '=', $categoryId);
    })
      ->with('images')
      ->where([['parent_id', '=', 0], ['status', '=', 1]])
      ->orderByDesc('created_at')
      ->get();

    $filter = Filter::whereHas('mappedCategories', function ($q) use ($categoryId) {
      $q->where('category_id', '=', $categoryId);
    })
      ->with('mappedFilterValues')
      ->orderByDesc('sort')
      ->get();

    return compact('products', 'filter');
  }

  public function productDetail($productId, $typeOneId, $typeTwoId): object
  {
    // if no variant ID is available then it will return the parent master product details
    $product = Product::find($productId);
    // if only one variant ID is available then it will return the variant product details
    if (isset($typeOneId)) {
      $product = Product::where([
        ['id', '=', $productId], ['type_value_id_1', '=', $typeOneId]
      ])
        ->orWhere([
          ['parent_id', '=', $productId], ['type_value_id_1', '=', $typeOneId]
        ])
        ->first();
    }
    // if both variant ID's are available then it will return the variant product details of both the variant type
    if (isset($typeOneId) && isset($typeTwoId)) {
      $optionalProduct = Product::where([
        ['id', '=', $productId], ['type_value_id_1', '=', $typeOneId], ['type_value_id_2', '=', $typeTwoId]
      ])
        ->orWhere([
          ['parent_id', '=', $productId], ['type_value_id_1', '=', $typeOneId], ['type_value_id_2', '=', $typeTwoId]
        ])->first();
      if (isset($optionalProduct)) {
        $product = $optionalProduct;
      }
    }
    $this->increaseViewCount($productId);
    return $product;
  }

  public function increaseViewCount($productId)
  {
    return Product::find($productId)->increment('view_count');
  }


  // This function gets the product type values for the product detail page which are mapped with the product.
  public function getProductTypeValues($productId, $typeOneId): array
  {
    $firstTypes = $secondTypes = [];
    $productsTypeOne = Product::where('id', '=', $productId)
      ->orWhere('parent_id', '=', $productId)
      ->groupBy('type_value_id_1')
      ->get();
    $productsTypeTwo = Product::where([['id', '=', $productId], ['type_value_id_1', '=', $typeOneId]])
      ->orWhere([['parent_id', '=', $productId], ['type_value_id_1', '=', $typeOneId]])
      ->groupBy('type_value_id_2')
      ->get();
    foreach ($productsTypeOne as $key => $product) {
      $firstTypes[] = $product->productTypeValueOne;
    }
    foreach ($productsTypeTwo as $key => $product) {
      $secondTypes[] = $product->productTypeValueTwo;
    }
    return compact('firstTypes', 'secondTypes');
  }
}
