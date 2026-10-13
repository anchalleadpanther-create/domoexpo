<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Models\Ecommerce\Product;
use App\Http\Controllers\Controller;
use App\Models\Ecommerce\ProductType;
use App\Models\Ecommerce\ProductPrice;
use App\Models\Ecommerce\ProductMappedCategory;
use App\Repositories\Ecommerce\ProductRepository;

class ProductPricingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Ecommerce\ProductPrice  $productPrice
   * @return \Illuminate\Http\Response
   */
  public function show(ProductPrice $productPrice)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Ecommerce\ProductPrice  $productPrice
   * @return \Illuminate\Http\Response
   */
  public function edit(int $id, $type)
  {
    if ($type === 'wholesale') {
      $productPrice = ProductPrice::find($id);
      $product = (isset($productPrice->parentProduct)) ? $productPrice->parentProduct : $productPrice;
      $allProductPricing = ProductPrice::where('product_id', '=', $product->id)->get();
    } else {
      $productPrice = Product::find($id);
      $product = (isset($productPrice->parentProduct)) ? $productPrice->parentProduct : $productPrice;
      $allProductPricing = Product::where('parent_id', '=', $product->id)->get();
    }
    $lastCategoryId = ProductMappedCategory::where('product_id', $product->id)->latest('id')->value('category_id');
    $productTypes = ProductType::orderby('type')->whereIn('type', ['Color', 'Size'])->with('mappedProductTypeValues')->get();
    return view('ecommerce.edit-product-pricing', compact('productPrice', 'allProductPricing', 'productTypes', 'lastCategoryId', 'type', 'product'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Ecommerce\ProductPrice  $productPrice
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $id, string $type, ProductRepository $ProductRepository)
  {
    $ProductRepository->updateVariantDetails($request, $id, $type);
    return redirect()->back()->with('success', 'Product pricing variant details has been successfully updated.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ecommerce\ProductPrice  $productPrice
   * @return \Illuminate\Http\Response
   */
  public function destroy(ProductPrice $productPrice)
  {
    //
  }
}
