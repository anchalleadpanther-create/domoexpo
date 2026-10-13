<?php

namespace App\Models\Extensions;

use App\Models\Extension\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
  use HasFactory;

  protected $table = 'cpr_currencies';

  protected $guarded = ['id'];

  public function country(): BelongsTo
  {
    return $this->belongsTo(Country::class, 'country_id');
  }
}
