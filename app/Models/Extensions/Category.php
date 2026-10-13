<?php

namespace App\Models\Extensions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
  use HasFactory;

  protected $table = 'cpr_categories';
  
  protected $guarded = ['id'];

  public function mappedFilters(): BelongsToMany
  {
    return $this->belongsToMany(Filter::class, 'cpr_category_mapped_filters', 'category_id', 'filter_id');
  }

  public function mappedBrands(): BelongsToMany
  {
    return $this->belongsToMany(Brand::class, 'cpr_brand_mapped_categories', 'category_id', 'brand_id');
  }

}
