<?php

namespace App\Models\Extensions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  use HasFactory;

  protected $table = 'cpr_pages';

  protected $guarded = ['id'];

}
