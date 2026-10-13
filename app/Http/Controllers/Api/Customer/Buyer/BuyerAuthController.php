<?php

namespace App\Http\Controllers\Api\Customer\Buyer;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Buyer\BuyerRegistrationRequest;
use App\Repositories\Customer\Buyer\BuyerAuthRepository;

class BuyerAuthController extends ApiController
{
  protected $BuyerAuthRepository;

  public function __construct(BuyerAuthRepository $BuyerAuthRepository)
  {
    $this->BuyerAuthRepository = $BuyerAuthRepository;
  }

  public function register(BuyerRegistrationRequest $request)
  {
    $tokenResult = $this->BuyerAuthRepository->apiRegister($request);
    $data = [
      'token' => $tokenResult,
      'token_type' => 'Bearer',
    ];

    return $this->successResponse(compact('data'), 'Thank you for registring on Coprocure. Please complete your profile.');
  }

  public function login(Request $request)
  {
    $request->validate([
      'ar_email' => 'required|exists:cpr_buyers,ar_email',
      'password' => 'required',
    ]);
    if (!Auth::guard('buyer')->attempt($request->only('ar_email', 'password'))) {
      return $this->errorResponse('Wrong credentials', 404);
    }
    $data = [
      'token' => Auth::guard('buyer')->user()->createToken('API Token')->plainTextToken,
      'token_type' => 'Bearer',
    ];
    return $this->successResponse($data, 'You have been successfully logged in.');
  }
}
