<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlueDartToken extends Model
{
  use HasFactory;

  protected $table = 'blue_Dart_tokens';

  protected $guarded = ['id'];

  protected $casts = [
    'images' => 'array',
    'date' => 'datetime',
  ];
}
