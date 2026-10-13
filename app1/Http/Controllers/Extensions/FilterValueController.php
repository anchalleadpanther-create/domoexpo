<?php

namespace App\Http\Controllers\Extensions;

use Illuminate\Http\Request;
use App\Models\Extensions\Filter;
use App\Http\Controllers\Controller;
use App\Models\Extensions\FilterValue;
use App\Repositories\Extensions\FilterValueRepository;

class FilterValueController extends Controller
{
  public function __construct(FilterValueRepository $FilterValueRepository)
  {
    $this->FilterValueRepository = $FilterValueRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $filterValues = FilterValue::orderByDesc('id')->get();
    $filters = Filter::orderByDesc('id')->get();
    return view('extensions.filter-values', compact('filterValues', 'filters'));
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
    $this->FilterValueRepository->store($request);
    return redirect()->route('admin.filter-values.index')->with('success', 'New filter values has been added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Extensions\FilterValue  $filterValue
   * @return \Illuminate\Http\Response
   */
  public function show(FilterValue $filterValue)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Extensions\FilterValue  $filterValue
   * @return \Illuminate\Http\Response
   */
  public function edit(FilterValue $filterValue)
  {
    $filterValues = FilterValue::orderByDesc('id')->get();
    $filters = Filter::orderByDesc('id')->get();
    return view('extensions.filter-values', compact('filterValue', 'filterValues', 'filters'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Extensions\FilterValue  $filterValue
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $id)
  {
    $this->FilterValueRepository->update($request, $id);
    return redirect()->route('admin.filter-values.index')->with('success', 'Filter value has been successfully updated.');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->FilterValueRepository->toggleStatus($id, $status);
    return back()->with('success', 'Filter values status has been changed.');
  }

  public function updateSorts(Request $request)
  {
    $this->FilterValueRepository->updateSort($request);
    return back()->with('success', 'Filter values sorts have been updated.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\FilterValue  $filterValue
   * @return \Illuminate\Http\Response
   */
  public function destroy(FilterValue $filterValue)
  {
    FilterValue::find($filterValue->id)->delete();
    return back()->withErrors('Filter value have been successfully deleted.');
  }
}
