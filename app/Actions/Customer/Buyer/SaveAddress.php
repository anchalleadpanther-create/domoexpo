<?php

namespace App\Actions\Customer\Buyer;

use Error;
use App\Models\Buyer\Buyer;
use App\Traits\ApiResponser;
use App\Models\Customer\Address;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Repositories\Buyer\CartRepository;
use App\Http\Requests\Customer\AddressRequest;
use App\Repositories\Customer\Buyer\BuyerAuthRepository;
use Illuminate\Validation\ValidationException;

class SaveAddress
{
  use AsAction, ApiResponser;

  public function __construct(private BuyerAuthRepository $buyerAuthRepository, private CartRepository $cartRepository)
  {
  }

  public function asController(AddressRequest $request): JsonResponse
  {
    try {
      $request->request->add(['is_guest' => 1]);
      $request->request->add(['phone' => $request->mobile]);

      $buyer = Buyer::where('email', '=', $request->email)->first();

      if (!isset($buyer)) {
        $buyer = $this->buyerAuthRepository->register($request);
      } else {
        $this->cartRepository->updateBuyerIdInCart($buyer->id);
        Auth::guard('buyer')->login($buyer);
      }

      Address::create($request->validated() + ['user_id' => $buyer->id]);
      return $this->successResponse([]);
    } catch (ValidationException $th) {
      return $this->errorResponse([], $th->errors());
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }
}
