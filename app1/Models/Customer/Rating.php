<?php

namespace App\Models\Customer;

use App\Models\Buyer\Buyer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
  use HasFactory;

  protected $table = 'cpr_ratings';

  protected $guarded = ['id'];

  protected $casts = [
    'images' => 'array',
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(Buyer::class, 'user_id');
  }
}
