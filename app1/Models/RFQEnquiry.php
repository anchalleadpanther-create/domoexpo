<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RFQEnquiry extends Model
{
  use HasFactory;

  protected $table = 'rfq_inquiries';

  protected $guarded = ['id'];
}
