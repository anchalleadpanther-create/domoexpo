<?php

namespace App\Models;

use App\Models\Extension\City;
use App\Models\Extension\State;
use App\Models\Extension\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventRegistration extends Model
{
  use HasFactory;

  protected $table = 'cpr_event_registrations';

  protected $guarded = ['id'];

  public function setEmailAttribute($value)
  {
    $this->attributes['email'] = strtolower($value);
  }

  public function event(): BelongsTo
  {
    return $this->belongsTo(Event::class, 'event_id');
  }

  public function country(): BelongsTo
  {
    return $this->belongsTo(Country::class, 'country_id');
  }

  public function state(): BelongsTo
  {
    return $this->belongsTo(State::class, 'state_id');
  }

  public function city(): BelongsTo
  {
    return $this->belongsTo(City::class, 'city_id');
  }
}
