<?php

namespace App\Models\Extension;

use App\Models\Buyer\Buyer;
use App\Models\Buyer\Order;
use App\Models\Extension\State;
use App\Models\Supplier\SupplierOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
  use HasFactory;

  protected $table = 'cpr_cities';

  public function orders(): HasMany
  {
    return $this->hasMany(Order::class, 'shipping_city_id');
  }

  public function orderItems(): HasMany
  {
    return $this->hasMany(SupplierOrder::class, 'shipping_city_id');
  }

  public function state(): BelongsTo
  {
    return $this->belongsTo(State::class, 'state_id');
  }
}
