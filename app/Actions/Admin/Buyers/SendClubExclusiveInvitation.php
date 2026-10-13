<?php

namespace App\Actions\Admin\Buyers;

use App\Models\Buyer\Buyer;
use App\Traits\WhatsappNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Mail\Admin\ClubExclusiveInvitation;

class SendClubExclusiveInvitation
{
  use AsAction, WhatsappNotification;

  public function handle(int $id): RedirectResponse
  {
    try {
      $buyer = Buyer::findOrFail($id);
      $buyer->update(['membership_type' => 'Club Exclusive Tier']);
      Mail::to($buyer->email)->send(new ClubExclusiveInvitation(['buyer' => $buyer]));
      $this->clubExclusiveTierWhatsappNotification($buyer);
      return back()->with('success', 'Invitation sent successfully');
    } catch (\Throwable $th) {
      dd($th);
    }
  }
}
