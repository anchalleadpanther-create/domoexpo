<?php

namespace App\Models\Extensions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
  use HasFactory;

  protected $table = 'cpr_faq';

  protected $guarded = ['id'];
}
