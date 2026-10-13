<?php

namespace App\Actions\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class ChangePassword
{
  use AsAction;

  public function rules(): array
  {
    return [
      'password' => ['required', 'min:6', 'max:30', 'confirmed'],
    ];
  }

  public function handle(Request $request): RedirectResponse
  {
    User::find(auth()->user()->id)->update(['password' => $request->password]);
    return back()->with('success', 'Password has been updated successfully');
  }
}
