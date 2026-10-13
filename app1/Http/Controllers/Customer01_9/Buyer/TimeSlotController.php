<?php

namespace App\Http\Controllers\Customer\Buyer;

use Illuminate\Http\Request;
use App\Models\Buyer\TimeSlot;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Api\ApiController;
use App\Repositories\Buyer\TimeSlotRepository;

class TimeSlotController extends ApiController
{
  public function __construct(private TimeSlotRepository $timeSlotRepository)
  {
  }

  public function index(): JsonResponse
  {
    if (isset(request()->day))
      return $this->successResponse(TimeSlot::where([['user_id', '=', auth()->user()->id], ['day', '=', request()->day]])->get());
    return $this->successResponse(TimeSlot::where('user_id', '=', auth()->user()->id)->get());
  }

  public function store(Request $request): RedirectResponse
  {
    $this->timeSlotRepository->store(request: $request, userId: auth()->user()->id);
    return back()->with('success', 'Time slots have been successfully updated');
  }

  public function setExclusions(int $id, string $exludingDate): JsonResponse
  {
    $timeSlot = TimeSlot::findOrFail($id);
    $newSlots = [...$timeSlot->excluding_dates, $exludingDate];
    $timeSlot->update(['excluding_dates' => $newSlots]);
    return $this->successResponse([], 'Time slots have been successfully deleted');
  }

  public function destroy(int $id): JsonResponse
  {
    $timeSlot = TimeSlot::findOrFail($id)->delete();
    return $this->successResponse($timeSlot, 'Time slots have been successfully deleted');
  }
}
