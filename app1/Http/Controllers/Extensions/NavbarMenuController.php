<?php

namespace App\Http\Controllers\Extensions;

use Illuminate\View\View;
use App\Models\NavbarMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class NavbarMenuController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(): View
  {
    $menus = NavbarMenu::orderBy('name', 'asc')->get();
    return view('extensions.navbar-menus', compact('menus'));
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
    NavbarMenu::create($request->only(['type', 'name', 'url']));
    return back()->with('success', 'Menu has been successfully saved!');
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
  public function update(Request $request, int $id): RedirectResponse
  {
    if ($request->update_type === 'sort-update') :
      foreach ($request->id as $key => $id) :
        NavbarMenu::where('id', '=', $id)->update(['sort' => $request->sort[$key]]);
      endforeach;

    elseif ($request->update_type === 'normal-update') :
      NavbarMenu::findOrFail($id)->update($request->only(['type', 'name', 'url', 'status']));
    endif;

    return back()->with('success', 'Menu updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id): RedirectResponse
  {
    NavbarMenu::findOrFail($id)->delete();
    return back()->withErrors('Navbar menu deleted successfully');
  }
}
