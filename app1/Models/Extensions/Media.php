<?php

namespace App\Models\Extensions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
  use HasFactory;

  protected $table = 'cpr_medias';

  protected $guarded = ['id'];

}
