<?php

namespace App\Http\Controllers\Extensions;

use App\Http\Controllers\Controller;
use App\Models\Extensions\FooterCategory;
use Illuminate\Http\Request;

class FooterCategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  
  public function index()
  {
    $categories = FooterCategory::where('parent_id', '=', 0)->orderBy('name')->get();
    return view('extensions.footer-categories', compact('categories'));
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
    FooterCategory::insert($request->except(['_token']));
    return back()->with('success', 'Footer Category added successfully!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Extensions\FooterCategory  $footerCategory
   * @return \Illuminate\Http\Response
   */
  public function show(FooterCategory $footerCategory)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Extensions\FooterCategory  $footerCategory
   * @return \Illuminate\Http\Response
   */
  public function edit(FooterCategory $footerCategory)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Extensions\FooterCategory  $footerCategory
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $message = NULL;
    if ($request->type === 'sort-update') :
      foreach ($request->id as $key => $id) :
        FooterCategory::find((int)$id)->update(['sort' => $request->sortid[$key]]);
      endforeach;
      $message = 'Footer category sort numbers has been updated successfully!';
    elseif ($request->type === 'normal-update') :
      FooterCategory::find($id)->update($request->except('_method', '_token', 'type'));
      $message = 'Footer category has been updated successfully!';
    endif;

    return back()->with('success', $message);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\FooterCategory  $footerCategory
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id)
  {
    FooterCategory::where('id', '=', $id)->delete();
    return back()->withErrors('Footer category has been deleted successfully');
  }
}
