<?php

namespace App\Http\Controllers\Extensions;

use Illuminate\Http\Request;
use App\Models\Extensions\Dropdown;
use App\Http\Controllers\Controller;
use App\Repositories\Extensions\SelectBoxRepository;
use App\Http\Requests\Extensions\DropdownRequest;

class SelectBoxAttributeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $dropDowns = Dropdown::orderBy('dropdown_name')->get();
    return view('extensions.add-select-box', compact('dropDowns'));
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
  public function store(DropdownRequest $request)
  {
    Dropdown::insert($request->except(['_token']));
    return back()->with('success', 'Dropdown added successfully!');
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
  public function update(Request $request, $id, SelectBoxRepository $SelectBoxRepository)
  {
    $responseMessage = $SelectBoxRepository->update($request, $id);
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
    Dropdown::where('id', '=', $id)->delete();
    return back()->withErrors('Dropdown has been deleted successfully');
  }
}
