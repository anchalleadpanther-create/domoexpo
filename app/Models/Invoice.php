<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  use HasFactory;

  protected $table = 'cpr_orders_invoice_ids';

  protected $guarded = ['id'];
}
