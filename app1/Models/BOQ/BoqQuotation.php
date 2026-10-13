<?php

namespace App\Models\BOQ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BOQ\BoqMainItem;
use App\Models\Extension\State;
use App\Models\Extension\City;
use App\Models\Buyer\Buyer;
use App\Models\BOQ\BoqAcceptationByContractor;
use App\Models\BOQ\BoqSentToByQuantitySurveyor;

class BoqQuotation extends Model
{
  use HasFactory;

  protected $table = 'boq_quotations';

  protected $guarded = ['id'];
  
  protected $casts = [
      'project_need' => 'array'
      ];
  
  
  public function architect(){
      return $this->belongsTo(Buyer::class,'architect_id');
  }
  
  public function boqCreatedBy(){
      return $this->belongsTo(Buyer::class,'created_by_user_id');
  }
  
  
  public function getBoqMainItem(){
      return $this->hasMany(BoqMainItem::class,'boq_id');
  }
  
  public function projectCity(){
      return $this->belongsTo(State::class,'project_city');
  }
  
  public function projectArea(){
      return $this->belongsTo(City::class,'project_area');
  }
  
  public function mappedContractorType()
  {
    return $this->hasMany(BoqMappedWithContractorType::class, 'boq_id');
  } 
  
  public function mappedContractor()
  {
    return $this->hasMany(BoqMappedWithContractor::class, 'boq_id');
  }
  
  public function mappedArchitect()
  {
    return $this->hasMany(BoqMappedWithArchitect::class, 'boq_id');
  }
  
  
  public function mappedQuantitySurveyor()
  {
    return $this->hasMany(BoqSentToByQuantitySurveyor::class, 'boq_id');
  }
  
  
  public function mappedContractorForWork()
  {
    return $this->hasMany(BoqAcceptationByContractor::class, 'boq_id');
  }
  
  
  
  public function contractorAcceptations()
{
    return $this->hasMany(BoqAcceptationByContractor::class, 'boq_id');
}


public function getContractorStatus($contractorId)
{
    $record = $this->contractorAcceptations()->where('contractor_id', $contractorId)->first();
    return $record ? $record->status : 'New Project';
}
  
  public function contractorAcceptation()
  {
    return $this->hasOne(BoqAcceptationByContractor::class, 'boq_id');
  }

//     // Accessor for isBuyerAccepted
//     public function getIsContractorAcceptedAttribute()
//     {
//         return optional($this->contractorAcceptation)->is_accepted == 1;
//     }
}
