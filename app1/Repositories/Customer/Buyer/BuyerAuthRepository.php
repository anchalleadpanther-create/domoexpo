<?php

namespace App\Repositories\Customer\Buyer;

use App\Traits\Wallet;
use App\Models\Buyer\Buyer;
use App\Repositories\BaseRepository;
use App\Repositories\Buyer\CartRepository;
use App\Traits\WhatsappNotification;
use Illuminate\Support\Facades\Auth;
use Spatie\Newsletter\Facades\Newsletter;

class BuyerAuthRepository extends BaseRepository
{
  use Wallet, WhatsappNotification;

  public function register($request): Buyer
  {
    //   dd($request->all());
    $membershipExpiryDate = null; //date('Y-m-d', strtotime('+3 years'));
   
    $buyer = Buyer::create($request->only('first_name', 'last_name','parent_id','email','phonecode' ,'phone', 'dob', 'newsletter', 'password','account_type','company_name','registration_no','vat_no',
                                            'telephone_code','telephone_no','address','company_email') + ['wallet' => 0, 'membership_expiry_date' => $membershipExpiryDate]);
    $buyer = Buyer::find($buyer->id);

    if (session()->has('referredBy'))
      $buyer->update(['referred_by' => Buyer::where('email', '=', session()->get('referredBy'))->value('id')]);

    if (isset($request->newsletter))
      Newsletter::subscribeOrUpdate($buyer->email);

    $this->addRegistrationBonusPoints($buyer);
    $this->newRegistration($buyer);
    Auth::guard('buyer')->login($buyer);
    $cartRepository = new CartRepository;
    $cartRepository->updateBuyerIdInCart($buyer->id);
    return $buyer;
  }

  public function apiRegister($request): string
  {
    $user = Buyer::create($request->except('_token', 'password_confirmation', 'via'));
    return $user->createToken('authToken')->plainTextToken;
  }
}
