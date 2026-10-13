<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Models\Ecommerce\Taxes;
use App\Http\Controllers\Controller;
use App\Repositories\Ecommerce\TaxesRepository;

class TaxesController extends Controller
{
  public function __construct(TaxesRepository $TaxesRepository)
  {
    $this->TaxesRepository = $TaxesRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $taxes = Taxes::orderByDesc('id')->get();
    return view('ecommerce.tax.index', compact('taxes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('ecommerce.tax.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->TaxesRepository->store($request);
    return redirect()->route('admin.taxes.index')->with('success', 'Tax has been successfully saved!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Ecommerce\Taxes  $taxes
   * @return \Illuminate\Http\Response
   */
  public function show(Taxes $taxes)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Ecommerce\Taxes  $taxes
   * @return \Illuminate\Http\Response
   */
  public function edit(int $id)
  {
    $taxes = Taxes::find($id);
    return view('ecommerce.tax.create', compact('taxes'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Ecommerce\Taxes  $taxes
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $id)
  {
    $this->TaxesRepository->update($request, $id);
    return redirect()->route('admin.taxes.index')->with('success', 'Tax has been successfully updated!');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->TaxesRepository->toggleStatus($id, $status);
    return back()->with('success', 'Tax status has been changed.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ecommerce\Taxes  $taxes
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id)
  {
    Taxes::find($id)->delete();
    return back()->withErrors('Tax has been successfully deleted!');
  }
}
