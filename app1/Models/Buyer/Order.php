<?php

namespace App\Models\Buyer;

use App\Models\UTM;
use App\Models\Buyer\Cart;
use App\Models\Buyer\Buyer;
use App\Events\OrderCreated;
use App\Models\Extension\City;
use App\Models\Extension\State;
use App\Models\Extension\Country;
use App\Models\Extensions\Currency;
use App\Models\Supplier\SupplierOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  protected $table = 'cpr_orders';

  protected $with = ['orderItems', 'buyer', 'country', 'state', 'city'];

  protected $dispatchesEvents = [
    'created' => OrderCreated::class,
  ];

  public function buyer(): BelongsTo
  {
    return $this->belongsTo(Buyer::class, 'user_id');
  }

  public function orderItems(): HasMany
  {
    return $this->hasMany(Cart::class, 'cart_id', 'cart_id');
  }

  public function country(): BelongsTo
  {
    return $this->belongsTo(Country::class, 'shipping_country_id');
  }

  public function state(): BelongsTo
  {
    return $this->belongsTo(State::class, 'shipping_state_id');
  }

  public function city(): BelongsTo
  {
    return $this->belongsTo(City::class, 'shipping_city_id');
  }

  public function orderCurrency(): BelongsTo
  {
    return $this->belongsTo(Currency::class, 'currency_id');
  }

  public function utm(): BelongsTo
  {
    return $this->belongsTo(UTM::class, 'utm_id');
  }
}
