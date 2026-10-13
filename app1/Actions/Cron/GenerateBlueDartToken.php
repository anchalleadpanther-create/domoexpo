<?php

namespace App\Actions\Cron;

use Illuminate\Support\Facades\Http;
use App\Models\BlueDartToken;
use Illuminate\Support\Facades\Mail;
use Lorisleiva\Actions\Concerns\AsAction;

class GenerateBlueDartToken
{
  use AsAction;

  public function handle()
  {
    try {
      $response = Http::withHeaders([
        'Accept' => 'application/json',
        'ClientID' => 'ArFaKiAgmP1F7WH9kNVPVtoRoZzyCOFN',
        'clientSecret' => 'Vf6fL2P7kpgSfht2'
      ])->get('https://apigateway-sandbox.bluedart.com/in/transportation/token/v1/login');

      
      if ($response->ok()) {
        // Delete all rows in the BlueDartToken table
        BlueDartToken::truncate();
        // Create new token
        BlueDartToken::create(['token' => $response->object()->JWTToken]);

        return back()->with('success', 'Token generated successfully.');
      }

      return back()->with('error', 'Something went wrong, please try again.');
    } catch (\Throwable $th) {
      // Log the error or handle it as needed
      logger()->error('Error generating BlueDart token: ' . $th->getMessage());

      return back()->with('error', 'An error occurred while generating the token.');
    }
  }
}
