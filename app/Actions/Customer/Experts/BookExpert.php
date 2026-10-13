<?php

namespace App\Actions\Customer\Experts;

use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use App\Models\Buyer\PackageBooking;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Http\Requests\Buyer\BookPackageRequest;

class BookExpert
{
  use AsAction, ApiResponser;

  public function asController(BookPackageRequest $request): JsonResponse
  {
    try {
      return $this->successResponse(PackageBooking::create($request->validated() + ['user_id' => auth()->guard('buyer')->check() ? auth()->guard('buyer')->user()->id : null]));
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }
}
