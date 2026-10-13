<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductPrice extends Model
{
  use HasFactory;

  protected $table = 'cpr_product_prices';

  protected $guarded = ['id'];

  public function productType(): BelongsTo
  {
    return $this->belongsTo(ProductType::class, 'type_id');
  }

  public function productTypeValueOne(): BelongsTo
  {
    return $this->belongsTo(ProductTypeValue::class, 'type_value_id_1');
  }

  public function productTypeValueTwo(): BelongsTo
  {
    return $this->belongsTo(ProductTypeValue::class, 'type_value_id_2');
  }

  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class, 'product_id');
  }

} 
