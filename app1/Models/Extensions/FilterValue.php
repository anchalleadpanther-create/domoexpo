<?php

namespace App\Models\Extensions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FilterValue extends Model
{
  use HasFactory;

  protected $table = 'cpr_filter_values';

  protected $guarded = ['id'];

  public function filter(): BelongsTo
  {
    return $this->belongsTo(Filter::class);
  }

}
