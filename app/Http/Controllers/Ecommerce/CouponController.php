<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Coupon;
use App\Models\Ecommerce\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ecommerce\CouponRequest;

class CouponController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $coupons = Coupon::latest()->get();
    return view('ecommerce.coupon.index', compact('coupons'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $brands = Brand::orderBy('brand_name')->select('id', 'brand_name')->where('status', '=', 1)->get();

    return view('ecommerce.coupon.create', compact('brands'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CouponRequest $request)
  {
    Coupon::create($request->except(['_token']) + ['user_id' => auth()->user()->id]);
    return redirect()->route('admin.coupon.create')->with('success', 'Coupon created successfully');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Ecommerce\Coupon  $coupon
   * @return \Illuminate\Http\Response
   */
  public function show(Coupon $coupon)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Ecommerce\Coupon  $coupon
   * @return \Illuminate\Http\Response
   */
  public function edit(Coupon $coupon)
  {
    $brands = Brand::orderBy('brand_name')->select('id', 'brand_name')->where('status', '=', 1)->get();
    $products = Product::whereIn('brand_id', array_map('intval', $coupon->brands))->orderBy('name')->select('id', 'name', 'sku')->get();

    return view('ecommerce.coupon.edit', compact('brands', 'coupon', 'products'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Ecommerce\Coupon  $coupon
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Coupon $coupon)
  {
    //   dd($request->all());
    $coupon->update($request->except(['_token', '_method']));
    return redirect()->route('admin.coupon.index')->with('success', 'Coupon updated successfully');
  }

  public function toggleStatus($id, $status)
  {
    Coupon::find($id)->update(['status' => $status]);
    return redirect()->route('admin.coupon.index')->with('success', 'Coupon status updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ecommerce\Coupon  $coupon
   * @return \Illuminate\Http\Response
   */
  public function destroy(Coupon $coupon)
  {
    $coupon->delete();
    return redirect()->route('admin.coupon.index')->with('success', 'Coupon status deleted successfully');
  }
}
