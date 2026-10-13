<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
  /**
   * The Artisan commands provided by your application.
   *
   * @var array
   */
  protected $commands = [
    Commands\ChangeUserTier::class,
    Commands\AbandonedCart::class,
    Commands\CreditRewardAllotment::class,
    Commands\WalletSummary::class,
  ];

  /**
   * Define the application's command schedule.
   *
   * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
   * @return void
   */
  protected function schedule(Schedule $schedule)
  {
    $schedule->command('changeusertier:cron')->dailyAt('6:00');
    $schedule->command('abandonedcart:cron')->everyFifteenMinutes();
    $schedule->command('creditrewardallotment:cron')->everySixHours();
    $schedule->command('walletsummary:cron')->lastDayOfMonth('20:00');
  }

  /**
   * Register the commands for the application.
   *
   * @return void
   */
  protected function commands()
  {
    $this->load(__DIR__ . '/Commands');

    require base_path('routes/console.php');
  }
}
