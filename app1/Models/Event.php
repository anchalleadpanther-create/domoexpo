<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  use HasFactory;

  protected $table = 'cpr_events';

  protected $guarded = ['id'];

  protected $casts = [
    'images' => 'array',
    'date' => 'datetime',
  ];
}
