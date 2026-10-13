<?php

namespace App\Models\BOQ;

use App\Models\Buyer\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Ecommerce\Category;
use App\Models\BoqQuotation;

class BoqStatusFollowUp extends Model
{
  use HasFactory;

  protected $table = 'boq_status_follow_ups';

  protected $guarded = ['id'];
  
  public function boq(){
     return  $this->belongsTo(BoqQuotation::class,'boq_id');
  }
  
}
