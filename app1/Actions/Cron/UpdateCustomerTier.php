<?php

namespace App\Actions\Cron;

use App\Traits\Wallet;
use App\Models\Buyer\Buyer;
use App\Traits\WhatsappNotification;
use Illuminate\Support\Facades\Mail;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Mail\Customer\UpgradedToIvoryTier;
use App\Mail\Customer\UpgradedToSilverTier;
use App\Mail\Customer\MembershipUpgradeMail;

class UpdateCustomerTier
{
  use AsAction, Wallet, WhatsappNotification;

  public function handle(): void
  {
    try {
      foreach (Buyer::all() as $buyer) {
        $newTier = NULL;
        if ($buyer->membership_points > \App\Helpers\Tiers::currentTier('Ivory Tier')->requiredPoints && $buyer->membership_type === 'Pink Tier')
          $buyer->update(['membership_type' => $newTier = 'Ivory Tier']);

        if ($buyer->membership_points > \App\Helpers\Tiers::currentTier('Silver Tier')->requiredPoints && ($buyer->membership_type === 'Pink Tier' || $buyer->membership_type === 'Ivory Tier'))
          $buyer->update(['membership_type' => $newTier = 'Silver Tier']);

        if (isset($newTier))
          switch ($newTier) {
            case 'Ivory Tier':
              Mail::to($buyer->email)->send(new UpgradedToIvoryTier([
                'buyer' => $buyer,
                'membershipId' => str_split($buyer->membership_id, 4),
                'newTier' => $newTier,
                'newTierColor' => '#F2EFDE',
              ]));
              $this->ivoryTierWalletBonus(buyer: $buyer, amount: \App\Helpers\Tiers::currentTier('Ivory Tier')->walletBonus);
              $this->ivoryTierWhatsappNotification(buyer: $buyer);
              break;
            case 'Silver Tier':
              Mail::to($buyer->email)->send(new UpgradedToSilverTier([
                'buyer' => $buyer,
                'membershipId' => str_split($buyer->membership_id, 4),
                'newTier' => $newTier,
                'newTierColor' => '#C0C0C0',
              ]));
              $this->silverTierWalletBonus(buyer: $buyer, amount: \App\Helpers\Tiers::currentTier('Silver Tier')->walletBonus);
              $this->silverTierWhatsappNotification(buyer: $buyer);
              break;
          }
      }
    } catch (\Throwable $th) {
      dd($th->getMessage());
    }
  }
}
