<?php

namespace App\Models\Extension;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  use HasFactory;

  protected $table = 'cpr_countries';
}
