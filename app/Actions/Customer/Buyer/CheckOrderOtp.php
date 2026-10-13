<?php

namespace App\Actions\Customer\Buyer;

use App\Models\OTP;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CheckOrderOtp
{
  use AsAction, ApiResponser;

  public function handle(int $id, int $otp): JsonResponse
  {
    try {
      $getOTP = OTP::findOrFail($id);
      if ((int)$getOTP->otp !== $otp)
        return $this->errorResponse([], 'Wrong otp! Please enter the correct otp.');

      $getOTP->delete();
      return $this->successResponse(true, 'OTP matched! Placing order.');
    } catch (ModelNotFoundException $th) {
      return $this->errorResponse([], $th->getMessage());
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }
}
