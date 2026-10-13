<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Actions\Cron\CreditRewardAllotment as CreditRewardAllotmentAction;
use App\Actions\Cron\WalletReminderNotification;

class WalletSummary extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'walletsummary:cron';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'This command send notification to the customers regarding the usage of their wallet each month';

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    return WalletReminderNotification::run();
  }
}
