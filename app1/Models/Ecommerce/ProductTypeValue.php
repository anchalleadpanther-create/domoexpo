<?php

namespace App\Models\Ecommerce;

use App\Models\Ecommerce\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductTypeValue extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  protected $table = 'cpr_product_types_values';

  protected $with = ['productType'];

  public function productType(): BelongsTo
  {
    return $this->belongsTo(ProductType::class, 'type_id');
  }

  public function typeOneProducts(): HasMany
  {
    return $this->hasMany(Product::class, 'type_value_id_1');
  }

  public function typetwoProducts(): HasMany
  {
    return $this->hasMany(Product::class, 'type_value_id_2');
  }
}
