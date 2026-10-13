<?php

namespace App\Actions\Customer;

use App\Models\Buyer\Buyer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Lorisleiva\Actions\Concerns\AsAction;

class AcceptClubExclusiveInvitation
{
  use AsAction;

  public function handle(string $id): RedirectResponse
  {
    $id = Crypt::decryptString($id);
    Buyer::findOrFail($id)->update(['membership_type' => 'Club Exclusive Tier']);
    return redirect()->route('home')->with('success', 'Membership upgraded!');
  }
}
