<?php

namespace App\Models\Extensions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FooterCategory extends Model
{
  use HasFactory;

  protected $table = 'cpr_footer_categories';

  protected $guarded = ['id'];

  public function category(): BelongsTo
  {
    return $this->belongsTo(FooterCategory::class, 'parent_id');
  }

  public function subCategories(): HasMany
  {
    return $this->hasMany(FooterCategory::class, 'parent_id')->where('status', '=', 1);
  }
}
