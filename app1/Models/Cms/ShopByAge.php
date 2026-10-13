<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopByAge extends Model
{
  use HasFactory;

  protected $table = 'shop_by_ages';

  protected $guarded = ['id'];
}
