<?php
namespace App\Models\Customer;

use App\Events\AddressCreated;
use App\Models\Extension\City;
use App\Models\Extension\State;
use App\Models\Extension\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AskForSample extends Model
{
  use HasFactory;

  protected $table = 'ask_for_samples';

  protected $guarded = ['id'];


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
