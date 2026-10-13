<?php

namespace App\Models\BOQ;

use App\Models\Buyer\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Ecommerce\Category;
use App\Models\Supplier\Supplier;

class BoqMappedSupplierSubItemRate extends Model
{
  use HasFactory;

  protected $table = 'boq_mapped_supplier_sub_item_rates';

  protected $guarded = ['id'];
  
  public function supplier(){
     return  $this->belongsTo(Supplier::class,'supplier_id');
  }
  
  public function getSubCategory(){
     return  $this->belongsTo(Category::class,'sub_category');
  }
  
  public function getSubSubCategory(){
     return  $this->belongsTo(Category::class,'sub_sub_category');
  }
}



