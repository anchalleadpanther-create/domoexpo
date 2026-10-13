<?php

namespace App\Models;

use App\Models\Buyer\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Analytic extends Model
{
  use HasFactory;

  protected $table = 'cpr_analytics';

  protected $guarded = ['id'];
}
