<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\Ecommerce\Product;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ComparisonController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $products = Product::whereIn('id', session('compareProducts', []))->get();
    return view('customer.compare', compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $compareProducts = session('compareProducts', []);
    if (!in_array($request->id, $compareProducts) && count($compareProducts) <= 4)
      $compareProducts[] = (int)$request->id;

    session(['compareProducts' => $compareProducts]);
         return $this->successResponse([],  "Product has been added in Comparison items. ", 202);

  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $compareProducts = session('compareProducts', []);

    $indexToRemove = array_search($id, $compareProducts);

    if ($indexToRemove !== false) {
      unset($compareProducts[$indexToRemove]);
    }

    $compareProducts = array_values($compareProducts);

    session(['compareProducts' => $compareProducts]);
    
    return $this->successResponse([],  "Product has been deleted from Comparison items. ", 202);
  }
}
