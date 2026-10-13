<?php

namespace App\Models\Extensions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryMappedFilter extends Model
{
  use HasFactory;

  protected $table = 'cpr_category_mapped_filters';

  protected $guarded = ['id'];

  public function filter(): BelongsTo
  {
    return $this->belongsTo(Filter::class, 'filter_id', 'id');
  }

}
