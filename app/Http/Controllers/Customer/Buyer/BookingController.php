<?php

namespace App\Http\Controllers\Customer\Buyer;

use Illuminate\Http\JsonResponse;
use App\Models\Buyer\PackageBooking;
use Illuminate\Support\Facades\Blade;
use App\Http\Controllers\Api\ApiController;
use App\View\Components\Customer\BookingsList;

class BookingController extends ApiController
{
  public function index(): JsonResponse
  {
    try {
      $bookings = PackageBooking::latest()->where('expert_id', '=', auth()->user()->id)
        ->orWhere('user_id', '=', auth()->user()->id)
        ->cursorPaginate(10);
      $bookingTemplate = '';
      $nextPageUrl = $bookings->nextPageUrl();

      foreach ($bookings as $booking)
        $bookingTemplate .= Blade::renderComponent(new BookingsList($booking));

      return $this->successResponse(compact('bookingTemplate', 'nextPageUrl'));
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }

  public function toggleStatus(int $id, string $status): JsonResponse
  {
    try {
      PackageBooking::findOrFail($id)->update(['status' => $status]);
      return $this->successResponse([], 'Booking status has been changed!');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }
}
