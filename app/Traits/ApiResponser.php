<?php

namespace App\Traits;

trait ApiResponser
{
  protected function successResponse($data, $message = null, $code = 200)
  {
    return response()->json([
      'status' => 'success',
      'message' => $message,
      'data' => empty($data) ? (object)[] : $data,
    ], $code);
  }

  protected function errorResponse($data, $message = null, $code = 404)
  {
    return response()->json([
      'status' => 'error',
      'message' => $message,
      'data' => empty($data) ? (object)[] : $data,
    ], $code);
  }
}
