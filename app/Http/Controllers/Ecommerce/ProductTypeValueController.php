<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ecommerce\ProductType;
use App\Models\Ecommerce\ProductTypeValue;
use App\Repositories\Ecommerce\ProductTypeValueRepository;

class ProductTypeValueController extends Controller
{
  public function __construct(ProductTypeValueRepository $ProductTypeValueRepository)
  {
    $this->ProductTypeValueRepository = $ProductTypeValueRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $productTypeValues = ProductTypeValue::orderBy('type_value')->get();
    $productTypes = ProductType::orderByDesc('id')->get();
    return view('ecommerce.product-type-values', compact('productTypeValues', 'productTypes'));
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
    $this->ProductTypeValueRepository->store($request);
    return redirect()->route('admin.product-type-value.index')->with('success', 'New product type values has been added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Ecommerce\ProductTypeValue  $productTypeValue
   * @return \Illuminate\Http\Response
   */
  public function show(ProductTypeValue $productTypeValue)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Ecommerce\ProductTypeValue  $productTypeValue
   * @return \Illuminate\Http\Response
   */
  public function edit(ProductTypeValue $productTypeValue)
  {
    $productTypeValues = ProductTypeValue::orderByDesc('id')->get();
    $productTypes = ProductType::orderByDesc('id')->get();
    return view('ecommerce.product-type-values', compact('productTypeValue', 'productTypeValues', 'productTypes'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Ecommerce\ProductTypeValue  $productTypeValue
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $id)
  {
    $request->validate([
      'type_value' => 'required|unique:App\Models\Ecommerce\ProductTypeValue,type_value,' . app('request')->segment(3),
    ]);
    $this->ProductTypeValueRepository->update($request, $id);
    return redirect()->route('admin.product-type-value.index')->with('success', 'Product type value has been successfully updated.');
  }

  public function updateSorts(Request $request)
  {
    $this->ProductTypeValueRepository->updateSort($request);
    return back()->with('success', 'Product type value sorts have been updated.');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->ProductTypeValueRepository->toggleStatus($id, $status);
    return back()->with('success', 'Product type value status has been changed.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ecommerce\ProductTypeValue  $productTypeValue
   * @return \Illuminate\Http\Response
   */
  public function destroy(ProductTypeValue $productTypeValue)
  {
    ProductTypeValue::find($productTypeValue->id)->delete();
    return back()->withErrors('Product type value have been successfully deleted.');
  }
}
