<?php

namespace App\Models\Ecommerce;

use App\Models\Buyer\Cart;
use App\Models\Ecommerce\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer\DesignerWishlist;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
  use HasFactory;

  protected $table = 'cpr_brands';

  protected $guarded = ['id'];

  protected $casts = [
    'categories' => 'array',
  ];

  public function mappedCategories(): BelongsToMany
  {
    return $this->belongsToMany(Category::class, 'cpr_brand_mapped_categories', 'brand_id', 'category_id');
  }

  public function products(): HasMany
  {
    return $this->hasMany(Product::class, 'brand_id');
  }

  public function latestProduct(): HasOne
  {
    return $this->hasOne(Product::class, 'brand_id')->latest('id');
  }

  public function productsCount(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => $this->products->groupBy('sku')->count()
    );
  }

  public function inMyWishlist(): HasOne
  {
    if (Auth::guard('buyer')->check()) {
      return $this->hasOne(DesignerWishlist::class, 'designer_id')->where('user_id', '=', Auth::guard('buyer')->user()->id);
    }
    return $this->hasOne(DesignerWishlist::class, 'designer_id')->where('user_id', '=', 0);
  }

  public function orders(): HasMany
  {
    return $this->hasMany(Cart::class, 'brand_id')
      ->where('order_status', '=', 1)
      ->whereNotIn('status', [6, 7, 8]);
  }

  public function OrdersCount(): Attribute
  {
    return Attribute::make(
      get: fn () => $this->orders()->count()
    );
  }

  public function OrdersTotalSum(): Attribute
  {
    return Attribute::make(
      get: fn () => $this->orders()->selectRaw('sum(price_unit * quantity) as ordersTotalSum')->first()->ordersTotalSum,
    );
  }
}
