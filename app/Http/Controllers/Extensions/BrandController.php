<?php

namespace App\Http\Controllers\Extensions;

use Illuminate\Http\Request;
use App\Models\Extensions\Brand;
use App\Models\Extensions\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Extensions\BrandRequest;
use App\Repositories\Extensions\BrandRepository;

class BrandController extends Controller
{
  public function __construct(BrandRepository $BrandRepository)
  {
    $this->BrandRepository = $BrandRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $brands = Brand::orderByDesc('id')->get();
    return view('extensions.brands', compact('brands'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::orderBy('category_name')->where([['status', '=', 1], ['parent_id', '=', 0]])->get();
    return view('extensions.create-brand', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(BrandRequest $request)
  {
    $response = $this->BrandRepository->store($request);
    return redirect()->route('admin.brand.index')->with('success', 'New brand has been added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Extensions\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function show(Brand $brand)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Extensions\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function edit(Brand $brand)
  {
    $categories = Category::orderBy('category_name')->where([['status', '=', 1], ['parent_id', '=', 0]])->get();
    return view('extensions.create-brand', compact('brand', 'categories'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Extensions\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $id)
  {
    $response = $this->BrandRepository->update($request, $id);
    return redirect()->route('admin.brand.index')->with('success', 'Brand has been successfully updated');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->BrandRepository->toggleStatus($id, $status);
    return back()->with('success', 'Brand status has been changed.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function destroy(Brand $brand)
  {
    Brand::find($brand->id)->delete();
    return back()->withErrors('Brand has been deleted successfully.');
  }
}
