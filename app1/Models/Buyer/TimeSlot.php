<?php

namespace App\Models\Buyer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
  use HasFactory;

  protected $table = 'cpr_time_slots';

  protected $guarded = ['id'];

  protected $casts = [
    'excluding_dates' => 'array',
    'time' => 'datetime',
  ];
}
