<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierOrderStatus extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  protected $table = 'cpr_order_status';
}
