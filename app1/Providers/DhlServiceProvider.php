<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class DhlServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->singleton('dhl', function ($app) {
      return new Client([
        'base_uri' => 'https://api.dhl.com/',
        'headers' => [
          'Content-Type' => 'application/json',
          'Accept' => 'application/json',
          'Authorization' => 'Basic ' . base64_encode('USER_NAME:PASSWORD'),
        ],
      ]);
    });
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    //
  }
}
