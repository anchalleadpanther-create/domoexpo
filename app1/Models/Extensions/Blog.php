<?php

namespace App\Models\Extensions;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
  use HasFactory;

  protected $table = 'cpr_blogs';

  protected $guarded = ['id'];

  public function category(): BelongsTo
  {
    return $this->belongsTo(BlogCategory::class, 'category_id');
  }

  public function author(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_id');
  }

}
