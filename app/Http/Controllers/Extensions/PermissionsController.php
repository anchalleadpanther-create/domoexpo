<?php

namespace App\Http\Controllers\Extensions;

use Illuminate\Http\Request;
use App\Models\Extensions\Menu;
use App\Http\Controllers\Controller;
use App\Models\Extensions\Permission;

class PermissionsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $permissions = Permission::orderByDesc('id')->paginate(50);
    return view('extensions.permission.index', compact('permissions'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $menus = Menu::where([['status', '=', 1], ['parent_id', '=', 0]])->get();
    return view('extensions.permission.create', compact('menus'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Permission::create($request->only(['title', 'permissions', 'permission_type']));
    return back()->with('success', 'Permission have been created');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Extensions\Permission  $permission
   * @return \Illuminate\Http\Response
   */
  public function show(Permission $permission)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Extensions\Permission  $permission
   * @return \Illuminate\Http\Response
   */
  public function edit(Permission $permission)
  {
    $menus = Menu::where([['status', '=', 1], ['parent_id', '=', 0]])->get();
    return view('extensions.permission.edit', compact('menus', 'permission'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Extensions\Permission  $permission
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Permission $permission)
  {
    $permission->update($request->only(['title', 'permissions', 'permission_type']));
    return back()->with('success', 'Permission have been updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\Permission  $permission
   * @return \Illuminate\Http\Response
   */
  public function destroy(Permission $permission)
  {
    //
  }
}
