<?php

namespace App\Actions\SmsApi;

use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\Concerns\AsAction;

class LoginNSignupOtp
{
  use AsAction, ApiResponser;

  public function handle(string $numbers, string $templateName, array $data): JsonResponse
  {
    $response = Http::asForm()->post('https://api.textlocal.in/send/', [
      'apikey' => config('myconfig.TEXT_LOCAL_API_KEY'),
      'numbers' => $numbers,
      'sender' => 'SPARLT',
      'message' =>  $this->{$templateName}($data['otp']),
    ]);
    return $this->successResponse([], 'OTP for your Login has been sent.');
  }


  // https://api.textlocal.in/send/?apikey=mKKsoVmgNIs-bi8HxYL1Ywdxqvs9mGXA1WW6QS3w5N&sender=SPARLT&numbers=919953323804&message=Dear%20customer,%20%nHere%27s%20your%20code%20to%20confirm%20your%20Littletags%20order!%nYour%20OTP%20is%20X.%nEnter%20it%20now%20to%20complete%20your%20purchase.%20Do%20not%20share%20your%20OTP%20with%20anyone.

   // https://api.textlocal.in/send/?apikey=mKKsoVmgNIs-bi8HxYL1Ywdxqvs9mGXA1WW6QS3w5N&sender=SPARLT&numbers=918851596653&message=Dear%20customer,%20%nHere%27s%20your%20code%20to%20confirm%20your%20Littletags%20order!%nYour%20OTP%20is%20X.%nEnter%20it%20now%20to%20complete%20your%20purchase.%20Do%20not%20share%20your%20OTP%20with%20anyone.

  private function loginOtpTemplate(int $otp): string
  {
    // return "Dear customer, %nHere's your code to confirm your Littletags order!%nYour OTP is {$otp}.%nEnter it now to complete your purchase. Do not share your OTP with anyone.";
    

    return "Dear Customer, %nyour OTP is {$otp} to access your LittleTags.com account. Do not share your OTP with anyone.";
    // return "Dear Customer, %nyour OTP is {$otp} to access your LittleTags.com account. %nDo not share your OTP with anyone.";
    
    // return "Fashioneditindia.com%nYour OTP is {$otp}, to confirm your COD order. OTP is valid for 5min. Do not share your OTP with anyone. Please contact us for any further assistance. Regards. Fashioneditindia.com";
  }
}
