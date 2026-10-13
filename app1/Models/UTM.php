<?php

namespace App\Models;

use App\Models\Buyer\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UTM extends Model
{
  use HasFactory;

  protected $table = 'cpr_utms';

  protected $guarded = ['id'];

  public function orders(): HasMany
  {
    return $this->hasMany(Order::class, 'utm_id');
  }
}
