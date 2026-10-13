<?php

namespace App\Models\Buyer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
  use HasFactory;

  protected $table = 'cpr_packages';

  protected $guarded = ['id'];

  public function expert(): BelongsTo
  {
    return $this->belongsTo(Buyer::class, 'user_id');
  }
}
