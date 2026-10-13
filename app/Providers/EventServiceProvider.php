<?php

namespace App\Providers;

use App\Events\OrderCreated;
use App\Events\AddressCreated;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SaveMarketingQueryParams;
use App\Listeners\UpdatePhoneNumberIfMissing;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
  /**
   * The event listener mappings for the application.
   *
   * @var array
   */
  protected $listen = [
    Registered::class => [
      SendEmailVerificationNotification::class,
    ],
    OrderCreated::class => [
      SaveMarketingQueryParams::class,
    ],
    AddressCreated::class => [
      UpdatePhoneNumberIfMissing::class,
    ],
  ];

  /**
   * Register any events for your application.
   *
   * @return void
   */
  public function boot()
  {
    //
  }
}
