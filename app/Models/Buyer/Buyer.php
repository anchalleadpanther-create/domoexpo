<?php

namespace App\Models\Buyer;

use App\Models\Buyer\Wallet;
use App\Models\Extension\City;
use App\Models\Extension\State;
use App\Models\Customer\Address;
use App\Models\Extension\Country;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use App\Models\Extensions\DropdownValue;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Actions\Customer\SendRegistrationEmailNotification;
use App\Models\AskForSample;
 use App\Models\Buyer\BuyerGallaryImage;
 use App\Models\Customer\Rating;
 use App\Models\BOQ\BoqQuotation;
 use App\Models\BOQ\BoqAcceptationByContractor;


class Buyer extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $table = 'cpr_buyers';

  protected $guarded = ['id'];

  protected $casts = [
        'dob' => 'datetime', // Date of birth cast to Carbon instance
        'membership_expiry_date' => 'datetime', // Also cast to Carbon
        'contractor_type' => 'array', // Make sure this is a JSON column
    ];


  public static function boot()
  {
    parent::boot();
    static::created(function ($buyer) {
      SendRegistrationEmailNotification::run($buyer);
    });
  }

  public function setEmailAttribute($value)
  {
    $this->attributes['email'] = strtolower($value);
  }

  public function setPasswordAttribute($pass)
  {
    $this->attributes['password'] = Hash::make($pass);
  }
  
  
  public function boqProjects(){
      return $this->hasMany(BoqQuotation::class,'created_by_user_id');
  }
  
  
  public function boqAcceptationByContractor(){
      return $this->hasMany(BoqAcceptationByContractor::class,'contractor_id');
  }


  
//   public function getIsMembershipActiveAttribute()
//   {
//         if (!$this->membership_start_date || !$this->membership_expiry_date) {
//             return false;
//         }
    
//         $now = now();
//         return $now->between(
//             $this->membership_start_date,
//             $this->membership_expiry_date
//         );
//     }
    
    
    public function getIsMembershipActiveAttribute()
{
    if (!$this->membership_expiry_date) {
        return false;
    }

    $end = \Carbon\Carbon::parse($this->membership_expiry_date);
    $now = now();
    
    return $now->lte($end);
}
  
  
  
  public function getFullNameAttribute()
  {
    return $this->first_name . ' ' . $this->last_name;
  }

  protected function expertFullName(): Attribute
  {
    return Attribute::make(
      get: fn () => $this->expert_first_name . ' ' . $this->expert_last_name,
    );
  }

  public function referred(): BelongsTo
  {
    return $this->belongsTo(Buyer::class, 'referred_by');
  }
  
  
  public function gallaryImages(): HasMany
  {
    return $this->hasMany(BuyerGallaryImage::class, 'buyer_id')->orderBy('id', 'desc');
  }
  
 

  public function country(): BelongsTo
  {
    return $this->belongsTo(Country::class, 'biz_company_country');
  }

  public function state(): BelongsTo
  {
    return $this->belongsTo(State::class, 'biz_company_state');
  }

  public function city(): BelongsTo
  {
    return $this->belongsTo(City::class, 'biz_company_city');
  }

  public function productIndustries(): BelongsToMany
  {
    return $this->belongsToMany(DropdownValue::class, 'cpr_buyers_mapped_product_industries', 'supplier_id', 'dropdown_id');
  }

  public function serviceIndustries(): BelongsToMany
  {
    return $this->belongsToMany(DropdownValue::class, 'cpr_buyers_mapped_service_industries', 'supplier_id', 'dropdown_id');
  }

  public function mappedTypesOfHotels(): BelongsToMany
  {
    return $this->belongsToMany(DropdownValue::class, 'cpr_buyers_mapped_hotel_types', 'buyer_id', 'dropdown_id');
  }
  
  public function mappedTypesOfRestaurantOrCafe(): BelongsToMany
  {
    return $this->belongsToMany(DropdownValue::class, 'cpr_buyers_mapped_restaurant_or_cafe_types', 'buyer_id', 'dropdown_id');
  }
  
  
    
  public function organizationIndustries(): BelongsToMany
  {
    return $this->belongsToMany(DropdownValue::class, 'cpr_buyers_mapped_organization_industries', 'supplier_id', 'dropdown_id');
  }

  public function addresses(): HasMany
  {
    return $this->hasMany(Address::class, 'user_id');
  }
  
  
  public function ratings(): HasMany
  {
    return $this->hasMany(Rating::class, 'product_id')->where('type', '=', $this->account_type);
  }

  public function walletHistory(): HasMany
  {
    return $this->hasMany(Wallet::class, 'customer_id')->orderBy('id', 'desc');
  }

  public function packages(): HasMany
  {
    return $this->hasMany(Package::class, 'user_id')->orderBy('id', 'desc');
  }

  public function defaultPackage(): HasOne
  {
    return $this->hasOne(Package::class, 'user_id')->where('is_default', '=', 1);
  }

  public function slots(): HasMany
  {
    return $this->hasMany(TimeSlot::class, 'user_id')->orderBy('id', 'desc');
  }

  public function orders(): HasMany
  {
    return $this->hasMany(Cart::class, 'buyer_id')
      ->where('order_status', '=', 1)
      ->whereNotIn('status', [6, 7, 8]);
  }

  public function latestOrder(): HasOne
  {
    return $this->hasOne(Cart::class, 'buyer_id')
      ->where('order_status', '=', 1)
      ->whereNotIn('status', [6, 7, 8])
      ->latest();
  }

  public function getOrdersCountAttribute()
  {
    return $this->orders()->count();
  }

  public function getOrdersTotalSumAttribute()
  {
    $order = Order::where('user_id', '=', $this->id)
      ->whereNotIn('status', [6, 7, 8])
      ->selectRaw('sum(grand_total) as total, sum(shipping_charge) as total_shipping_charge, sum(wallet) as total_wallet, sum(coupon_amount) as total_coupon_amount, sum(gift_card_amount) as total_gift_card_amount, sum(referral_amount) as total_referral_amount')->first();
    return ($order->total + $order->total_shipping_charge) - ($order->total_wallet + $order->total_coupon_amount + $order->total_gift_card_amount + $order->total_referral_amount);
  }
  
  
  
    public function getReceiveQuotationStatusAttribute()
  {

    if ($this->attributes['quotation_status'] == 1) {
      return 'Enabled';
    } else{
      return 'Disabled';
    }
   
  }
  
  public function getBuyerAcountStatusAttribute()
  {
    if ($this->status === 1) {
      return 'Approved';
    } elseif ($this->status === 2) {
      return 'Disapproved';
    } elseif ($this->status === 3) {
      return 'On Hold';
    }elseif($this->supplier_status == 0){
        return 'New Registration';
    }
  }
  
  
  
  
  
  
  
}
