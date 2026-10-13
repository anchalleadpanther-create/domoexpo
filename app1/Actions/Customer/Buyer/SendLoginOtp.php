<?php

namespace App\Actions\Customer\Buyer;

use App\Models\OTP;
use App\Traits\ApiResponser;
use App\Actions\SmsApi\TextLocal;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class SendLoginOtp
{
  use AsAction, ApiResponser;

  public function handle(): JsonResponse
  {
    try {
      if (!isset(Auth::guard('buyer')->user()->phone))
        return $this->errorResponse([], 'Please update your mobile number in your profile before placing order.');
      $randomOtp = mt_rand(100000, 999999);

      TextLocal::run(Auth::guard('buyer')->user()->phone, 'codOtpTemplate', ['otp' => $randomOtp]);

      $otp = OTP::create(['otp' => $randomOtp]);

      return $this->successResponse(['otpId' => $otp->id], 'OTP has been sent to your phone number.');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }
}
