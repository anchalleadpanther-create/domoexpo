<?php
namespace App\Models\BOQ;

use App\Models\Buyer\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Buyer\Buyer;

class BoqAcceptationByContractor extends Model
{
  use HasFactory;

  protected $table = 'boq_acceptance_by_contractors';

  protected $guarded = ['id'];
  
  public function contractor(){
      return $this->belongsTo(Buyer::class,'contractor_id');
  }
  
}
