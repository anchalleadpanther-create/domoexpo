<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
  use HasFactory;

  protected $table = 'cpr_home_sliders';

  protected $guarded = ['id'];
}
