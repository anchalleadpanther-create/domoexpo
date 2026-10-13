<?php

namespace App\Actions;

use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class GetCategory
{
  use AsAction, ApiResponser;

  public function handle(int $parentId): JsonResponse
  {
    try {
      return $this->successResponse(getCategories($parentId), 'Categories Fetched.');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }
}
