<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Ecommerce\Category;

class RelatedCategoryMapped extends Model
{
  use HasFactory;

  protected $table = 'cpr_mapped_category_to_categories';

  protected $guarded = ['id'];

  public function category_a_info(): BelongsTo
  {
    return $this->belongsTo(Category::class, 'category_a');
  }

  public function category_b_info(): BelongsTo
  {
    return $this->belongsTo(Category::class, 'category_b');
  }
}