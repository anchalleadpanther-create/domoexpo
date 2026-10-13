<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierQNA extends Model
{
    use HasFactory;

    protected $table = "cpr_suppliers_qnas";
      protected $guarded = ['id'];
      
}
