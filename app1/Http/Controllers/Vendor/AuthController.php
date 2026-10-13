<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
  public function create(): View
  {
    return view('vendors.login');
  }

  public function store(): RedirectResponse
  {
    try {
      if (!Auth::guard('vendor')->attempt(request()->only('biz_email', 'password')))
        throw new \Error('Invalid credentials');

      Auth::guard('buyer')->logout();
      return redirect()->route('vendor.dashboard');
    } catch (\Throwable $th) {
      return back()->withErrors($th->getMessage());
    }
  }
}
