<?php

namespace App\Http\Controllers\Extensions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Extensions\CurrencyRequest;
use App\Models\Extensions\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
  public function __construct()
  {
    $this->middleware('HaltDefaultCurrencyModifications');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $currencies = Currency::all();
    return view('extensions.currencies', compact('currencies'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('extensions.create-currency');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CurrencyRequest $request)
  {
    $currency = Currency::create($request->validated() + ['status' => 1]);
    return redirect()->route('admin.currencies.index')->with('success', 'Currency created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Extensions\Currency  $currency
   * @return \Illuminate\Http\Response
   */
  public function show(Currency $currency)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Extensions\Currency  $currency
   * @return \Illuminate\Http\Response
   */
  public function edit(Currency $currency)
  {
    return view('extensions.create-currency', compact('currency'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Extensions\Currency  $currency
   * @return \Illuminate\Http\Response
   */
  public function update(CurrencyRequest $request, Currency $currency)
  {
    $currency->update($request->validated());
    return redirect()->route('admin.currencies.index')->with('success', 'Currency updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\Currency  $currency
   * @return \Illuminate\Http\Response
   */
  public function destroy(Currency $currency)
  {
    $currency->delete();
    return redirect()->route('admin.currencies.index')->with('success', 'Currency deleted successfully.');
  }
}
