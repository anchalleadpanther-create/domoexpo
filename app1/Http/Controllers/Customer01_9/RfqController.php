<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\Customer\Buyer\Rfq;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RfqController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $rfqs = Rfq::orderByDesc('id')->get();
    return view('customer.rfq.rfqs', compact('rfqs'));
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
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Customer\Buyer\Rfq  $rfq
   * @return \Illuminate\Http\Response
   */
  public function show(int $id)
  {
    $rfq = Rfq::find($id);
    return view('customer.rfq.rfq-details', compact('rfq'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Customer\Buyer\Rfq  $rfq
   * @return \Illuminate\Http\Response
   */
  public function edit(Rfq $rfq)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Customer\Buyer\Rfq  $rfq
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Rfq $rfq)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Customer\Buyer\Rfq  $rfq
   * @return \Illuminate\Http\Response
   */
  public function destroy(Rfq $rfq)
  {
    //
  }
}
