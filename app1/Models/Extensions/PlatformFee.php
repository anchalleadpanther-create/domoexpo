<?php

namespace App\Models\Extensions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformFee extends Model
{
  use HasFactory;

  protected $table = 'platform_fees';

  protected $guarded = ['id'];

}
