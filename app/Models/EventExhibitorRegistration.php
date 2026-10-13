<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventExhibitorRegistration extends Model
{
  use HasFactory;

  protected $table = 'cpr_event_exhibitor_registrations';

  protected $guarded = ['id'];

  public function setEmailAttribute($value)
  {
    $this->attributes['email'] = strtolower($value);
  }

  public function event(): BelongsTo
  {
    return $this->belongsTo(Event::class, 'event_id');
  }
}
