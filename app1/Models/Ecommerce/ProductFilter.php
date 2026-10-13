<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFilter extends Model
{
  use HasFactory;

  protected $table = 'cpr_product_mapped_filters';

  protected $guarded = ['id'];
}
