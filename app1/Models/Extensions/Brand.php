<?php

namespace App\Models\Extensions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
  use HasFactory;

  protected $table = 'cpr_brands';

  protected $guarded = ['id'];

  public function mappedCategories(): BelongsToMany
  {
    return $this->belongsToMany(Category::class, 'cpr_brand_mapped_categories', 'brand_id', 'category_id');
  }
}
