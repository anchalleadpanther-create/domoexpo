<?php

namespace App\Http\Controllers\Extensions;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Extensions\Permission;

class UsersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::where('type', '=', 'sub_admin')->orderBy('id')->paginate(100);
    return view('extensions.users.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $permissions = Permission::orderBy('title')->get();
    return view('extensions.users.create', compact('permissions'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    User::create($request->except(['_token']));
    return back()->with('success', 'Admin user have been created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    $permissions = Permission::orderBy('title')->get();
    return view('extensions.users.edit', compact('permissions', 'user'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
    $user->update($request->except(['_token', '_method']));
    return back()->with('success', 'Admin user have been updated successfully.');
  }

  public function toggleStatus(int $id, int $status)
  {
    User::where('id', $id)->update(['status' => $status]);
    return redirect()->route('admin.users.index')->with('success', 'Admin user status have been updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    $user->delete();
    return back()->withErrors('Admin user have been deleted.');
  }
}
