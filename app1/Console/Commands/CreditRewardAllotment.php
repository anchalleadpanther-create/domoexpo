<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Actions\Cron\CreditRewardAllotment as CreditRewardAllotmentAction;

class CreditRewardAllotment extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'creditrewardallotment:cron';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'This command send notification to the customers regarding the rewards they earned for the purchases made between 10th to 31st of jan 2023.';

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    return CreditRewardAllotmentAction::run();
  }
}
