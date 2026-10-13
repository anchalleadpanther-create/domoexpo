<?php

namespace App\Models\Customer;

use App\Models\Buyer\Buyer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryPincode extends Model
{
  use HasFactory;

  protected $table = 'delivery_pincodes';

  protected $guarded = ['id'];

  
}