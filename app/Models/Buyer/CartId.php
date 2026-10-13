<?php

namespace App\Models\Buyer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartId extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  protected $table = 'cpr_cart_ids';

}
