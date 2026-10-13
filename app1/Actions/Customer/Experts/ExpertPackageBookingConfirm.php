<?php

namespace App\Actions\Customer\Experts;

use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use App\Mail\Customer\ExpertBooking;
use App\Models\Buyer\PackageBooking;
use Illuminate\Support\Facades\Mail;
use Lorisleiva\Actions\Concerns\AsAction;

class ExpertPackageBookingConfirm
{
  use AsAction, ApiResponser;

  public function handle(): JsonResponse
  {
    try {
      PackageBooking::findOrFail(request()->id)->update(['payment_status' => 'Completed', 'razorpay_payment_id' => request()->razorpay_payment_id]);
      $booking = PackageBooking::findOrFail(request()->id);
      Mail::to($booking->email)->send(new ExpertBooking(['booking' => $booking]));
      Mail::to($booking->expert->email)->cc(projectCCEmails())->send(new ExpertBooking(['booking' => $booking]));
      return $this->successResponse(PackageBooking::with('expert')->findOrFail(request()->id), 'Booking has been completed!');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }
}
