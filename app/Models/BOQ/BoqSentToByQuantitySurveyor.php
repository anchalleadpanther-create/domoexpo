<?php
namespace App\Models\BOQ;

use App\Models\Buyer\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Buyer\Buyer;

class BoqSentToByQuantitySurveyor extends Model
{
  use HasFactory;

  protected $table = 'boq_sent_to_quantity_surveyors';

  protected $guarded = ['id'];
  
  public function boq()
  {
    return $this->belongsTo(BoqQuotation::class, 'boq_id');
  }
  
  public function qs()
  {
    return $this->belongsTo(Buyer::class, 'quantity_surveyor_id');
  }
  
  
}
