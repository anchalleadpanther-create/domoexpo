<?php

namespace App\Http\Controllers\Api;

use App\Models\Ecommerce\Category;
use App\Http\Controllers\Api\ApiController;

class CategoryController extends ApiController
{
  /**
   * Handle the incoming request.
   *
   * @return \Illuminate\Http\Response
   */
  public function __invoke()
  {
    return $this->successResponse(Category::orderBy('sort')->with('children')->get());
  }
}
