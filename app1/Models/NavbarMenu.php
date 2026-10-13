<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavbarMenu extends Model
{
  use HasFactory;

  protected $table = 'cpr_navbar_menus';

  protected $guarded = ['id'];
}
