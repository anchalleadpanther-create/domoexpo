<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{
  use HasFactory;

  protected $table = 'cpr_gift_cards';

  protected $guarded = ['id'];

  protected $casts = [
    'date_from' => 'date',
    'date_till' => 'date',
  ];
}
