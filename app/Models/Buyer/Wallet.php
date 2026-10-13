<?php

namespace App\Models\Buyer;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  protected $table = 'cpr_wallet_history';

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
