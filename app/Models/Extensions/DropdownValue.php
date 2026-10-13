<?php

namespace App\Models\Extensions;

use App\Models\Ecommerce\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DropdownValue extends Model
{
  use HasFactory;

  protected $table = 'cpr_dropdown_value';

  protected $guarded = ['id'];

  public function occasionProducts(): HasMany
  {
    return $this->hasMany(Product::class, 'occasion', 'dropdown_value')->where('cpr_products.parent_id', '=', 0)->select('id');
  }

  public function getOccasionProductsCountAttribute()
  {
    return $this->occasionProducts()->count();
  }

  public function availabilityProducts(): HasMany
  {
    return $this->hasMany(Product::class, 'availability', 'dropdown_value')->where('cpr_products.parent_id', '=', 0)->select('id');
  }

  public function getAvailabilityProductsCountAttribute()
  {
    return $this->availabilityProducts()->count();
  }

  public function materialProducts(): HasMany
  {
    return $this->hasMany(Product::class, 'material', 'dropdown_value')->where('cpr_products.parent_id', '=', 0)->select('id');
  }

  public function getMaterialProductsCountAttribute()
  {
    return $this->materialProducts()->count();
  }
}
