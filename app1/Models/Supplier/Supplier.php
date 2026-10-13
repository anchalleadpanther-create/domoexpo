<?php

namespace App\Models\Supplier;
 
use App\Models\User;
use App\Models\Buyer\Cart;
use Illuminate\Support\Facades\Hash;
use App\Models\Extension\City;
use App\Models\Extension\State;
use App\Models\Ecommerce\Product;
use App\Models\Extension\Country;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Extensions\DropdownValue;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\ServiceCategory;
use App\Models\Customer\DesignerWishlist;
use Illuminate\Support\Facades\Auth;

class Supplier extends Authenticatable
{ 
  use HasApiTokens, HasFactory, Notifiable;

  protected $table = 'cpr_suppliers';

  protected $guarded = ['id'];

  protected $casts = [
    'biz_reg_date' => 'datetime',
    'po_emails' => 'array',
  ];

  public $rfqId = null;


   
  public function gallaryImages(): HasMany
  {
    return $this->hasMany(SupplierGallaryImage::class, 'supplier_id')->orderBy('id', 'desc');
  }
  
  
   public function getFullNameAttribute()
  {
    return $this->biz_company ?? '';
  }

  
  
  public function inMyWishlist(): HasOne
  {
    if (Auth::guard('buyer')->check()) {
      return $this->hasOne(DesignerWishlist::class, 'designer_id')->where('user_id', '=', Auth::guard('buyer')->user()->id);
    }
    return $this->hasOne(DesignerWishlist::class, 'designer_id')->where('user_id', '=', 0);
  }

  public function setBizEmailAttribute($value)
  {
    $this->attributes['biz_email'] = strtolower($value);
  }

  public function setArEmailAttribute($value)
  {
    $this->attributes['ar_email'] = strtolower($value);
  }

  public function setPasswordAttribute($pass)
  {
    $this->attributes['password'] = Hash::make($pass);
  }

  public function getClientTestimonials(): HasMany
  {
    return $this->hasMany(SupplierClientTestimonial::class, 'supplier_id');
  }
  
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function country(): BelongsTo
  {
    return $this->belongsTo(Country::class, 'biz_company_country');
  }

  public function state(): BelongsTo
  {
    return $this->belongsTo(State::class, 'biz_company_state');
  }

  public function officeCountry(): BelongsTo
  {
    return $this->belongsTo(Country::class, 'biz_office_country');
  }

  public function officeState(): BelongsTo
  {
    return $this->belongsTo(State::class, 'biz_office_state');
  }

  public function officeCity(): BelongsTo
  {
    return $this->belongsTo(City::class, 'biz_office_city');
  }

  public function sellerBankCountry(): BelongsTo
  {
    return $this->belongsTo(Country::class, 'bank_country');
  }
  public function sellerBankState(): BelongsTo
  {
    return $this->belongsTo(State::class, 'bank_state');
  }
  
  public function personNationality(): BelongsTo
  {
    return $this->belongsTo(DropdownValue::class, 'pa_nationality');
  }

  public function alternativePosition(): BelongsTo
  {
    return $this->belongsTo(DropdownValue::class, 'alt_position');
  }
  
  public function salesContactPosition(): BelongsTo
  {
    return $this->belongsTo(DropdownValue::class, 'sales_contact_position');
  }
  
  public function financeContactPosition(): BelongsTo
  {
    return $this->belongsTo(DropdownValue::class, 'finance_contact_position');
  }
  
  public function city(): BelongsTo
  {
    return $this->belongsTo(City::class, 'biz_company_city');
  }
 
  public function productIndustries(): BelongsToMany
  {
    return $this->belongsToMany(DropdownValue::class, 'cpr_suppliers_mapped_product_industries', 'supplier_id', 'dropdown_id');
  }

  public function suppllierDescribedSeller(): BelongsToMany
  {
    return $this->belongsToMany(DropdownValue::class, 'cpr_suppliers_mapped_describe_sellers', 'supplier_id', 'dropdown_id');
  }

  public function suppllierLikeToSell(): BelongsToMany
  {
    return $this->belongsToMany(DropdownValue::class, 'cpr_suppliers_mapped_sellers_like_to_sells', 'supplier_id', 'dropdown_id');
  }

  public function suppllierCountries(): BelongsToMany
  {
    return $this->belongsToMany(Country::class, 'cpr_suppliers_mapped_countries', 'supplier_id', 'country_id');
  }

  public function serviceIndustries(): BelongsToMany
  {
    return $this->belongsToMany(DropdownValue::class, 'cpr_suppliers_mapped_service_industries', 'supplier_id', 'dropdown_id');
  }

  public function shippingFromCountries(): BelongsToMany
  {
    return $this->belongsToMany(Country::class, 'cpr_suppliers_ship_from', 'supplier_id', 'country_id');
  }

  public function shippingToCountries(): BelongsToMany
  {
    return $this->belongsToMany(Country::class, 'cpr_suppliers_ship_to', 'supplier_id', 'country_id');
  }
  
  public function mappedCategories(): HasMany
  {
    return $this->hasMany(SupplierMappedCategory::class, 'supplier_id')->orderBy('category_id');
  }
  


  public function mappedProductCategories(): BelongsToMany
  {
    return $this->belongsToMany(Category::class, 'cpr_supplier_mapped_categories', 'supplier_id', 'category_id')->where('category_type','product')->orderBy('category_id');
  } 

  public function mappedServiceCategories(): BelongsToMany
  {
    return $this->belongsToMany(ServiceCategory::class, 'cpr_supplier_mapped_categories', 'supplier_id', 'category_id')->where('category_type','service')->orderBy('category_id');
  } 

  // public function setIsInRfqAttribute()
  // { 
  //   if($this->belongsTo(SupplierMappedRfq::class, 'supplier_id')->where('rfq_id', $this->rfqId)->exists()) {
  //     return true;
  //   }
  //   return false;
  // }

  public function products(): HasMany
  {
    return $this->hasMany(Product::class, 'seller_id');
  }

  public function getSellerPosition(): BelongsTo
  {
    return $this->belongsTo(DropdownValue::class, 'position');
  }

  public function ProductsCount(): Attribute
  {
    return Attribute::make(
      get: fn () => $this->products()->count()
    );
  }

  public function MadeToOrderProductsCount(): Attribute
  {
    return Attribute::make(
      get: fn () => $this->products()->where('availability', '=', 'MADE TO ORDER')->count()
    );
  }

  public function ReadyToShipProductsCount(): Attribute
  {
    return Attribute::make(
      get: fn () => $this->products()->where('availability', '=', 'READY TO SHIP')->count()
    );
  }

  public function orders(): HasMany
  {
    return $this->hasMany(Cart::class, 'seller_id')
      ->where('order_status', '=', 1)
      ->whereNotIn('status', [6, 7, 8]);
  }

  public function OrdersCount(): Attribute
  {
    return Attribute::make(
      get: fn () => $this->orders()->count()
    );
  }

  public function getSupplierAcountStatusAttribute()
  {
    if ($this->status === 1) {
      return 'Approved';
    } elseif ($this->status === 2) {
      return 'Disapproved';
    } elseif ($this->status === 3) {
      return 'On Hold';
    }
  }
}
