<?php

namespace App\Actions\Customer;

use App\Models\Buyer\Buyer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Customer\RegistrationBuyerEmail;
use Lorisleiva\Actions\Concerns\AsAction;

class SendRegistrationEmailNotification
{
  use AsAction;

  public function handle(Buyer $buyer): bool
  {
    $id = DB::table('cpr_loaylty_point_ids')->insertGetId(['created_at' => now(), 'updated_at' => now()]);
    $id = DB::table('cpr_loaylty_point_ids')->where('id', $id)->value('id');
    $yearOne = date('Y', strtotime('01-04-' . date('Y')));
    $yearTwo = date('y', strtotime('01-04-' . date('Y') . '+ 1 years'));
    $currentDate = date('d');
    $currentMonth = date('m');
    $membershipId = "{$currentDate}{$currentMonth}{$yearOne}{$yearTwo}{$id}";

    // $buyer->update(['membership_id' => $membershipId]);

    Mail::to($buyer->email)->send(new RegistrationBuyerEmail([
      'buyer' => $buyer
    ]));
    return true;
  }
}
