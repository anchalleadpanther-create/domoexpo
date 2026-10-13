<?php

namespace App\Models\Ecommerce;

use App\Models\Ecommerce\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
  use HasFactory;

  protected $table = 'cpr_product_mapped_categories';

  protected $guarded = ['id'];

  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class, 'product_id');
  }
}
