<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Models\Ecommerce\Category;
use App\Http\Controllers\Controller;
use App\Models\Ecommerce\ProductType;
use App\Http\Requests\Ecommerce\ProductTypeRequest;
use App\Repositories\Ecommerce\ProductTypeRepository;

class ProductTypeController extends Controller
{
  public function __construct(ProductTypeRepository $ProductTypeRepository)
  {
    $this->ProductTypeRepository = $ProductTypeRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $productTypes = ProductType::orderBy('type')->get();
    $categories = Category::where([['status', '=', 1], ['parent_id', '=', 0]])->orderBy('category_name')->get();
    return view('ecommerce.product-types', compact('productTypes', 'categories'));
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
  public function store(ProductTypeRequest $request)
  {
    $this->ProductTypeRepository->store($request);
    return redirect()->route('admin.product-type.index')->with('success', 'New product type has been added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Extensions\ProductType  $productType
   * @return \Illuminate\Http\Response
   */
  public function show(ProductType $productType)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Extensions\ProductType  $productType
   * @return \Illuminate\Http\Response
   */
  public function edit(ProductType $productType)
  {
    $productTypes = ProductType::orderByDesc('id')->get();
    $categories = Category::where('status', '=', 1)->orderBy('category_name')->get();
    return view('ecommerce.product-types', compact('productType', 'productTypes', 'categories'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Extensions\ProductType  $productType
   * @return \Illuminate\Http\Response
   */
  public function update(ProductTypeRequest $request, int $id)
  {
    $this->ProductTypeRepository->update($request, $id);
    return redirect()->route('admin.product-type.index')->with('success', 'Product type has been successfully updated.');
  }

  public function updateSorts(Request $request)
  {
    $this->ProductTypeRepository->updateSort($request);
    return back()->with('success', 'Category sorts have been updated.');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->ProductTypeRepository->toggleStatus($id, $status);
    return back()->with('success', 'Product type status has been changed.');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\ProductType  $productType
   * @return \Illuminate\Http\Response
   */
  public function destroy(ProductType $productType)
  {
    ProductType::find($productType->id)->delete();
    return redirect()->route('admin.product-type.index')->withErrors('Product type have been successfully deleted.');
  }
}
