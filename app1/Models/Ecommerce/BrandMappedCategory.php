<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BrandMappedCategory extends Model
{
  use HasFactory;

  protected $table = 'cpr_brand_mapped_categories';

  protected $guarded = ['id'];

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class, 'id', 'category_id');
  }
}
