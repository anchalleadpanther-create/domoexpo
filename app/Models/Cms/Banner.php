<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
  use HasFactory;

  protected $table = 'cpr_banners';

  protected $guarded = ['id'];
}
