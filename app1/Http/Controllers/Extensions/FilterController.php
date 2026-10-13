<?php

namespace App\Http\Controllers\Extensions;

use Illuminate\Http\Request;
use App\Models\Extensions\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Extensions\FilterRequest;
use App\Repositories\Extensions\FilterRepository;

class FilterController extends Controller
{
  public function __construct(FilterRepository $FilterRepository)
  {
    $this->FilterRepository = $FilterRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $filters = Filter::orderByDesc('id')->get();
    // dd($filters[1]->mappedCategories, $filters[1]->mappedFilterValues);
    return view('extensions.filters', compact('filters'));
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
  public function store(FilterRequest $request)
  {
    $this->FilterRepository->store($request);
    return redirect()->route('admin.filter.index')->with('success', 'New filter has been added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Extensions\Filter  $filter
   * @return \Illuminate\Http\Response
   */
  public function show(Filter $filter)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Extensions\Filter  $filter
   * @return \Illuminate\Http\Response
   */
  public function edit(Filter $filter)
  {
    $filters = Filter::orderByDesc('id')->get();
    return view('extensions.filters', compact('filter', 'filters'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Extensions\Filter  $filter
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $id)
  {
    $this->FilterRepository->update($request, $id);
    return redirect()->route('admin.filter.index')->with('success', 'Filter has been successfully updated.');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->FilterRepository->toggleStatus($id, $status);
    return back()->with('success', 'Filter status has been changed.');
  }

  public function updateSorts(Request $request)
  {
    $this->FilterRepository->updateSort($request);
    return back()->with('success', 'Filter sorts have been updated.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\Filter  $filter
   * @return \Illuminate\Http\Response
   */
  public function destroy(Filter $filter)
  {
    Filter::find($filter->id)->delete();
    return back()->withErrors('Filter have been successfully deleted.');
  }
}
