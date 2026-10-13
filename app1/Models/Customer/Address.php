<?php

namespace App\Models\Customer;

use App\Events\AddressCreated;
use App\Models\Extension\City;
use App\Models\Extension\State;
use App\Models\Extension\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
  use HasFactory;

  protected $table = 'cpr_addresses';

  protected $guarded = ['id'];

  protected $dispatchesEvents = [
    'created' => AddressCreated::class,
  ];

  public function getFullNameAttribute()
  {
    return $this->first_name . ' ' . $this->last_name;
  }

  public function setEmailAttribute($value)
  {
    $this->attributes['email'] = strtolower($value);
  }

  public function myCountry(): BelongsTo
  {
    return $this->belongsTo(Country::class, 'country');
  }

  public function myState(): BelongsTo
  {
    return $this->belongsTo(State::class, 'state');
  }

  public function myCity(): BelongsTo
  {
    return $this->belongsTo(City::class, 'city');
  }
}
