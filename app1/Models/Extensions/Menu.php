<?php

namespace App\Models\Extensions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  use HasFactory;

  protected $table = 'cpr_menus';

  protected $guarded = ['id'];

  public function children()
  {
    return $this->hasMany(Menu::class, 'parent_id')->with('children')->where('status', '=', 1);
  }
}
