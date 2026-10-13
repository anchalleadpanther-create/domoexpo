<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Models\Ecommerce\Shipping;
use App\Http\Controllers\Controller;
use App\Repositories\Ecommerce\ShippingRepository;

class ShippingController extends Controller
{
  public function __construct(ShippingRepository $ShippingRepository)
  {
    $this->ShippingRepository = $ShippingRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $shippings = Shipping::orderByDesc('id')->get();
    return view('ecommerce.shipping.index', compact('shippings'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('ecommerce.shipping.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->ShippingRepository->store($request);
    return redirect()->route('admin.shipping.index')->with('success', 'Shipping has been successfully saved!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Ecommerce\Shipping  $shipping
   * @return \Illuminate\Http\Response
   */
  public function show(Shipping $shipping)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Ecommerce\Shipping  $shipping
   * @return \Illuminate\Http\Response
   */
  public function edit(Shipping $shipping)
  {
    return view('ecommerce.shipping.create', compact('shipping'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Ecommerce\Shipping  $shipping
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $id)
  {
    $this->ShippingRepository->update($request, $id);
    return redirect()->route('admin.shipping.index')->with('success', 'Shipping has been successfully updated!');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->ShippingRepository->toggleStatus($id, $status);
    return back()->with('success', 'Shipping status has been changed.');
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ecommerce\Shipping  $shipping
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id)
  {
    Shipping::find($id)->delete();
    return back()->withErrors('Shipping has been successfully deleted!');
  }
}
