<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Product;
use App\Models\Supplier\Supplier;
use App\Models\Ecommerce\Category;
use App\Http\Controllers\Controller;
use App\Models\Ecommerce\ProductType;
use App\Models\Ecommerce\ProductImage;
use App\Models\Ecommerce\ProductCategory;
use App\Models\Customer\Rating;
use App\Http\Requests\Ecommerce\ProductRequest;
use App\Repositories\Ecommerce\ProductRepository;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
  use ApiResponser;

  public function __construct(private ProductRepository $ProductRepository)
  { 
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, string $type)
  {
    $query = Product::orderByDesc('id')->groupBy('sku');
    if ($type === 'wholesale') {
      $query->where([['variant_type', '=', 'wholesale'], ['parent_id', '=', 0]]);
    } elseif ($type === 'single') {
      $query->where([['variant_type', '=', 'single'], ['have_options', '=', 0], ['parent_id', '=', 0]]);
    } elseif ($type === 'single-with-variant') {
      $query->where([['variant_type', '=', 'single'], ['have_options', '=', 1]]);
    } elseif ($type === 'in-active') {
      $query->where('status', '=', 0);
    }

    if ($request->brand_id)
      $query->where('brand_id', '=', $request->brand_id);

    if ($request->search)
      $query->where('front_end_search_keyword', 'like', '%' . $request->search . '%');

    $products = $query->paginate(50)->appends(request()->query());
    $productTypes = ProductType::orderby('type')->whereIn('type', ['Color', 'Size'])->with('mappedProductTypeValues')->get();
    $brands = Brand::orderby('brand_name')->where('status', '=', 1)->get();

    return view('ecommerce.product.index', compact('products', 'productTypes', 'brands'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::where([['status', '=', 1], ['parent_id', '=', 0]])->get();
    $brands = Brand::where('status', '=', 1)->orderBy('brand_name')->get();
    $sellers = Supplier::where('status', '=', 1)->orderBy('biz_name')->get();
    return view('ecommerce.product.create', compact('categories', 'brands', 'sellers'));
  }

  /**
   * Store a newly created resource in storage.
   * 
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ProductRequest $request)
  {
    $this->ProductRepository->store($request);
    return redirect()->route('admin.products.index', 'single-with-variant')->with('success', 'Product has been successfully added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Ecommerce\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function show(Product $product)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Ecommerce\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {
    // dd($product->parentProduct, $product->variants);
    $productData = $this->ProductRepository->getProductDetails($product);
    // dd($productData);
    $brands = Brand::where('status', '=', 1)->orderBy('brand_name')->get();
    $sellers = Supplier::where('status', '=', 1)->orderBy('biz_name')->get();
    return view('ecommerce.product.edit', compact('product', 'productData', 'brands', 'sellers'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Ecommerce\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(ProductRequest $request, Product $product)
  {
    $this->ProductRepository->update($request, $product);
    return back()->with('success', 'Product has been successfully updated.');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->ProductRepository->toggleStatus($id, $status);
    return back()->with('success', 'Product status has been changed.');
  }


  public function sort(Request $request)
  {
    foreach ($request->sku as $key => $sku)
      Product::where('sku', '=', $sku)->update(['sort' => $request->sort[$key]]);

    return back()->with('success', 'Product sorts have been updated.');
  }

  public function bulkDelete(Request $request): JsonResponse
  {
    try {
      Product::whereIn('sku', $request->skus)->delete();
      return $this->successResponse([$request->skus], 'Product has been deleted.');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }

  public function bulkStatus(Request $request): JsonResponse
  {
    try {
      Product::whereIn('sku', $request->skus)->update(['status' => $request->status]);
      return $this->successResponse([$request->skus], 'Products status has been updated.');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }

  public function updateImageSorts(Request $request)
  {
    $this->ProductRepository->updateImageSort($request);
    return response()->json(['success' => true], 200);
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ecommerce\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product)
  {
    $id = $product->id;
    Product::find($product->id)->delete();
    Product::where('parent_id', $id)->delete();
    return back()->withErrors('Product has been deleted successfully.');
  }

  public function deleteProductImage(int $id)
  {
    $productImage = ProductImage::find($id);
    ProductImage::find($id)->delete();
    $this->ProductRepository->handleDeleteFile($productImage->image, 'products/');
    return back()->withErrors('Product image has been deleted successfully.');
  }

  public function deleteProductCategory(string $sku, int $categoryId)
  {
    ProductCategory::where('category_id', '=', $categoryId)->whereIn('product_id', Product::where('sku', '=', $sku)->pluck('id')->toArray())->delete();
    return back()->withErrors('Product category has been deleted successfully.');
  }

  public function productRatings(Request $request)
  {
    $product = Product::find((int)$request->id);
    $productIds = Product::where('sku', '=', $product->sku)->pluck('id')->toArray();
    $productRatings = Rating::whereIn('product_id', $productIds)->paginate(50);
    return view('ecommerce.product.productRating', compact('productRatings'));
  }

  public function toggleRatingStatus(int $id, int $status)
  {
    $saveStatus =  Rating::find($id);
    $saveStatus->status = $status;
    $saveStatus->save();
    return back()->with('success', 'Product  Rating status has been changed.');
  }
}
