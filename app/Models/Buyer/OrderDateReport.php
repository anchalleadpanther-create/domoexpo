<?php

namespace App\Models\Buyer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDateReport extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  protected $table = 'cpr_order_date_reports';

  protected $casts = [
    'date' => 'date',
  ];
}
