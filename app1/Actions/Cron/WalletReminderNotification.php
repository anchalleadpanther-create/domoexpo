<?php

namespace App\Actions\Cron;

use App\Mail\Admin\WalletReminder;
use Carbon\Carbon;
use App\Models\Buyer\Buyer;
use App\Models\Buyer\Wallet;
use App\Traits\WhatsappNotification;
use Illuminate\Support\Facades\Mail;
use Lorisleiva\Actions\Concerns\AsAction;

class WalletReminderNotification
{
  use AsAction, WhatsappNotification;

  public function handle(): void
  {
    $buyers = Buyer::where([['status', '=', 1], ['id', '=', 2110]])->get();
    $currentMonth = Carbon::now()->format('Y-m');

    foreach ($buyers as $buyer) {
      $tierImage = 'pinkcard-img.png';
      switch ($buyer->membership_type) {
        case 'Ivory Tier':
          $tierImage = 'IvoryTier-img.png';
          break;
        case 'Silver Tier':
          $tierImage = 'silverTier-img.png';
          break;
        default:
          $tierImage = 'pinkcard-img.png';
          break;
      }

      $data = [
        'membershipTier' => $buyer->membership_type,
        'pointsBalance' => $buyer->wallet,
        'validityOfPoints' => '',
        'pointsRedeemed' => Wallet::where([['customer_id', '=', $buyer->id], ['type', '=', 'DEBIT']])
          ->whereDate('created_at', 'like', $currentMonth . '%')
          ->sum('amount'),
        'tierImage' => $tierImage,
        'buyer' => $buyer,
      ];

      Mail::to($buyer->email)->send(new WalletReminder($data));
    }
  }
}
