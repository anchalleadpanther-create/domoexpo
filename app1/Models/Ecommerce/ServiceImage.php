<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
  use HasFactory;

  protected $table = 'cpr_service_images';
  
  protected $guarded = ['id'];

}
