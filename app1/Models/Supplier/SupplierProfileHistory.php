<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplierProfileHistory extends Model
{
  use HasFactory;

  protected $table = 'cpr_supplier_profile_histories';

  protected $guarded = ['id'];
}
