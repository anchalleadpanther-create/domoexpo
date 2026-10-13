<?php

namespace App\Http\Controllers\Extensions;

use Illuminate\Http\Request;
use App\Models\Extensions\Dropdown;
use App\Http\Controllers\Controller;
use App\Models\Extensions\DropdownValue;
use App\Http\Requests\Extensions\SelextBoxValueRequest;
use App\Repositories\Extensions\SelectBoxValuesRepository;

class SelectBoxAttributeValueController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $dropdowns = Dropdown::orderBy('dropdown_name')->get();
    $dropdownValues = DropdownValue::join('cpr_dropdowns', 'cpr_dropdowns.id', '=', 'cpr_dropdown_value.dropdown_id')
      ->select('cpr_dropdowns.dropdown_name', 'cpr_dropdown_value.*')
      ->get();
    return view('extensions.add-select-boxes-values', compact('dropdowns', 'dropdownValues'));
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
  public function store(SelextBoxValueRequest $request, SelectBoxValuesRepository $SelectBoxValuesRepository)
  {
    $responseMessage = $SelectBoxValuesRepository->store($request);
    return back()->with('success', $responseMessage);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id, SelectBoxValuesRepository $SelectBoxValuesRepository)
  {
    $responseMessage = $SelectBoxValuesRepository->update($request, $id);
    return back()->with('success', $responseMessage);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    DropdownValue::find($id)->delete();
    return back()->withErrors('Dropdown value has been deleted successfully');
  }
}
