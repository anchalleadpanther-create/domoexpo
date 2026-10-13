<?php

namespace App\Models\Extension;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
  use HasFactory;

  protected $table = 'cpr_states';

  public function country(): BelongsTo
  {
    return $this->belongsTo(Country::class, 'country_id');
  }
}
