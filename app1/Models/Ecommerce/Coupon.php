<?php

namespace App\Models\Ecommerce;

use App\Models\User;
use App\Models\Buyer\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
  use HasFactory;

  protected $table = 'cpr_coupons';

  protected $guarded = ['id'];

  protected $casts = [
    'brands' => 'array',
    'products' => 'array',
    'date_from' => 'date',
    'date_till' => 'date',
  ];

  public function totalDiscounts(): Attribute
  {
    return Attribute::make(
      get: fn () =>
      $this->hasMany(Order::class, 'coupon_code', 'name')
        ->whereHas('orderItems', function ($q) {
          $q->whereNotIn('status', [6, 7, 8]);
        })
        ->sum('coupon_amount'),
    );
  }

  public function totalUses(): Attribute
  {
    return Attribute::make(
      get: fn () =>
      $this->hasMany(Order::class, 'coupon_code', 'name')
        ->whereHas('orderItems', function ($q) {
          $q->whereNotIn('status', [6, 7, 8]);
        })
        ->count(),
    );
  }

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
