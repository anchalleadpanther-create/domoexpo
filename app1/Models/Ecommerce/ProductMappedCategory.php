<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductMappedCategory extends Model
{
  use HasFactory;

  protected $table = 'cpr_product_mapped_categories';

  protected $guarded = ['id'];

  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class, 'product_id');
  }

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class, 'category_id');
  }
}
