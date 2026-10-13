<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierMappedRfq extends Model
{
  use HasFactory;

  protected $table = 'cpr_suppliers_mapped_rfqs';

  protected $guarded = ['id'];
}
