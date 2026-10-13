<?php

namespace App\Models\BOQ;

use App\Models\Buyer\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Ecommerce\Category;
use App\Models\BOQ\BoqMappedSupplierSubItemRate;

class BoqSubItem extends Model
{
  use HasFactory;

  protected $table = 'boq_sub_items';

  protected $guarded = ['id'];
  
  public function getSubCategory(){
     return  $this->belongsTo(Category::class,'sub_category');
  }
  
  public function getSubSubCategory(){
     return  $this->belongsTo(Category::class,'sub_sub_category');
  }
  
  public function getSupplierRate(){
     return  $this->hasMany(BoqMappedSupplierSubItemRate::class,'boq_sub_item_id');
  }
}
