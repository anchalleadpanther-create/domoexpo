<?php

namespace App\Models\Supplier;

use App\Models\Invoice;
use App\Models\Buyer\Cart;
use App\Models\Buyer\Buyer;
use App\Models\Buyer\Order;
use App\Models\Extension\City;
use App\Models\Extension\State;
use App\Models\Extension\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplierOrder extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  protected $table = 'cpr_orders_suppliers';

  protected $with = ['buyer', 'country', 'state', 'city'];

  protected $casts = [
    'po_status_date' => 'datetime',
    'pickrr_response' => 'array',
    'delhivery_response' => 'array',
  ];

  public function poId(): Attribute
  {
    return Attribute::make(get: fn () => $this->po_prefix . $this->po_number);
  }

  public function buyer(): BelongsTo
  {
    return $this->belongsTo(Buyer::class, 'user_id');
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

  public function order(): BelongsTo
  {
    return $this->belongsTo(Order::class, 'order_id');
  }

  public function cartItem(): BelongsTo
  {
    return $this->belongsTo(Cart::class, 'cart_item_id');
  }

  public function invoice(): BelongsTo
  {
    return $this->belongsTo(Invoice::class, 'invoice_id');
  }
}
