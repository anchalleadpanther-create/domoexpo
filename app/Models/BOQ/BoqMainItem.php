<?php

namespace App\Models\BOQ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BOQ\BoqSubItem;
use App\Models\Ecommerce\Category;

class BoqMainItem extends Model
{
  use HasFactory;

  protected $table = 'boq_main_items';

  protected $guarded = ['id'];
  
  
  
  public function getSubItem(){
      return $this->hasMany(BoqSubItem::class,'main_item_id');
  }
  
  public function getCategory(){
     return  $this->belongsTo(Category::class,'category_id');
  }
}
