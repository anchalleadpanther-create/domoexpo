<?php

namespace App\Models\Extensions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filter extends Model
{
  use HasFactory;

  protected $table = 'cpr_filters';

  protected $guarded = ['id'];

  public function mappedFilterValues(): HasMany
  {
    return $this->hasMany(FilterValue::class, 'filter_id');
  }

  public function mappedCategories(): BelongsToMany
  {
    return $this->belongsToMany(Category::class, 'cpr_category_mapped_filters', 'filter_id', 'category_id');
  }


}
