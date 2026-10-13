<?php

namespace App\Models\Buyer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartRemark extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  protected $table = 'cpr_cart_remarks';
}
