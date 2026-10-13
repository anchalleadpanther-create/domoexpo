<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProductIndustry extends Model
{
  use HasFactory;

  protected $table = 'cpr_suppliers_mapped_product_industries';

  protected $guarded = ['id'];
}
