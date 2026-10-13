<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
  use HasFactory;

  protected $table = 'cpr_product_images';
  
  protected $guarded = ['id'];

}
