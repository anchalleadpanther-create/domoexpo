<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Actions\Cron\UpdateCustomerTier;

class ChangeUserTier extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'changeusertier:cron';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'This command changes the user tier on the basis of his order history';

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    return UpdateCustomerTier::run();
  }
}
