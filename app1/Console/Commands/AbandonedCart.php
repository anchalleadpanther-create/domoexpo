<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Actions\Cron\AbdandonedCartNotification;

class AbandonedCart extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'abandonedcart:cron';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'This command send notification to the customer regarding the products left hanging in the cart';

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    return AbdandonedCartNotification::run();
  }
}
