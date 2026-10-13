<?php

namespace App\Http\Controllers\Vendor;

use App\Traits\FileUpload;
use App\Models\ImportSheet;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Ecommerce\ProductType;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ExcelFileRequest;
use App\Imports\Admin\Products\ProductStockUpdateWithSku;

class ProductController extends Controller
{
  use ApiResponser, FileUpload;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $query = Product::orderByDesc('id')
      ->groupBy('sku')
      ->where([['variant_type', '=', 'single'], ['have_options', '=', 1], ['seller_id', '=', Auth::guard('vendor')->user()->id]]);

    if (request()->brand_id)
      $query->where('brand_id', '=', request()->brand_id);

    if (request()->search)
      $query->where('front_end_search_keyword', 'like', '%' . request()->search . '%');

    if (request()->collection)
      $query->where('collection', 'like', '%' . request()->collection . '%');

    $products = $query->paginate(50)->appends(request()->query());
    $productTypes = ProductType::orderby('type')->whereIn('type', ['Color', 'Size'])->with('mappedProductTypeValues')->get();
    $brands = Brand::orderby('brand_name')->where('status', '=', 1)->get();

    return view('vendors.products.index', compact('products', 'productTypes', 'brands'));
  }

  public function updateStock(ExcelFileRequest $request): RedirectResponse
  {
    try {
      Excel::import(new ProductStockUpdateWithSku(Auth::guard('vendor')->user()->id), $request->excelSheet);

      if ($request->hasfile('excelSheet'))
        $request->request->add(['sheet' => $this->handleSingleFileUpload($request->excelSheet, 'uploads/merchant/')]);

      ImportSheet::create(['file' => $request->sheet, 'type' => 'product_stock_update_against_with_sku', 'user_id' => Auth::guard('vendor')->user()->id]);

      return back()->with('success', 'Stock has been updated');
    } catch (\Exception $th) {
      dd($th);
      return back()->withErrors($th->getMessage());
    }
  }
}
