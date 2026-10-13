<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductType extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  protected $table = 'cpr_product_types';

  public function mappedProductTypeValues(): HasMany
  {
    return $this->hasMany(ProductTypeValue::class, 'type_id')->orderBy('sort');
  }

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class, 'category_id');
  }
}
