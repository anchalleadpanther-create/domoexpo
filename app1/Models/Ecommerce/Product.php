<?php

namespace App\Models\Ecommerce;

use App\Models\User;
use App\Models\Buyer\Cart;
use App\Models\Customer\Rating;
use App\Models\Ecommerce\Brand;
use App\Models\Supplier\Supplier;
use App\Models\Ecommerce\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Ecommerce\FilterValue;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer\ProductWishlist;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Extension\Country;

class Product extends Model
{
  use HasFactory;

  protected $table = 'cpr_products';

  protected $guarded = ['id'];

  // protected function setPrimaryKey($key)
  // {
  //   $this->primaryKey = $key;
  // }

  public function images(): HasMany
  {
    return $this->hasMany(ProductImage::class, 'product_id')->orderBy('sort');
  }

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function seller(): BelongsTo
  {
    return $this->belongsTo(Supplier::class, 'seller_id');
  }

  public function countryOfOrigin(){
    //   return Country::find(101);
    return $this->belongsTo(Country::class,'country_of_origin');
  }

  public function brand(): BelongsTo
  {
    return $this->belongsTo(Brand::class, 'brand_id');
  }

  public function variants(): HasMany
  {
    return $this->hasMany(Product::class, 'parent_id')->orderBy('id');
  }

  public function parentProduct(): BelongsTo
  {
    return $this->belongsTo(Product::class, 'parent_id');
  }

  public function prices(): HasMany
  {
    return $this->hasMany(ProductPrice::class, 'product_id');
  }

  public function mappedFilterValues(): BelongsToMany
  {
    return $this->belongsToMany(FilterValue::class, 'cpr_product_mapped_filters', 'product_id', 'filter_value_id');
  }

  public function mappedCategories(): BelongsToMany
  {
    return $this->belongsToMany(Category::class, 'cpr_product_mapped_categories', 'product_id', 'category_id')->orderBy('category_id');
  } 
  // public function mappedCategoriesNotInExtraCat(): BelongsToMany
  // {
  //   return $this->belongsToMany(Category::class, 'cpr_product_mapped_categories', 'product_id', 'category_id')->where('is_extra_cat',0)->orderBy('cpr_product_mapped_categories.id');
  // }

    public function mappedCategoriesNotInExtraCat(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'cpr_product_mapped_categories', 'product_id', 'category_id')
                    ->where('is_extra_cat', 0)
                    ->orderBy('cpr_product_mapped_categories.id');
    }


  public function mappedCategoriesUntouched(): BelongsToMany
  {
    // if ($this->parent_id !== 0) {
    //   $this->setPrimaryKey('parent_id');
    // }
    return $this->belongsToMany(Category::class, 'cpr_product_mapped_categories', 'product_id', 'category_id');
  }

  public function productTypeValueOne(): BelongsTo
  {
    return $this->belongsTo(ProductTypeValue::class, 'type_value_id_1');
  }

  public function productTypeValueTwo(): BelongsTo
  {
    return $this->belongsTo(ProductTypeValue::class, 'type_value_id_2');
  }

  public function productTypeValueThree(): BelongsTo
  {
    return $this->belongsTo(ProductTypeValue::class, 'type_value_id_3');
  }


  

  public function ratings(): HasMany
  {
    return $this->hasMany(Rating::class, 'product_id')->where('type', '=', 'product');
  }

  public function inMyWishlist(): HasOne
  {
    if (Auth::guard('buyer')->check()) {
      return $this->hasOne(ProductWishlist::class, 'product_id')->where('user_id', '=', Auth::guard('buyer')->user()->id);
    }
    return $this->hasOne(ProductWishlist::class, 'product_id')->where('user_id', '=', 0);
  }

  public function orders(): HasMany
  {
    return $this->hasMany(Cart::class, 'product_id')
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

  public function gstAmount(): Attribute
  {
    return Attribute::make(
      get: fn () => ((int)$this->gst / 100) * $this->price_unit,
    );
  }
}
