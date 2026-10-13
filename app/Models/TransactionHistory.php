<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Buyer\Buyer;
use App\Models\Supplier\Supplier;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\ServiceCategory;

class TransactionHistory extends Model
{
  use HasFactory;

  protected $table = 'cpr_transaction_histories';

  protected $guarded = ['id'];
  
  
 // For Buyer relationship
public function getBuyer()
{
    return $this->belongsTo(Buyer::class, 'user_id');
}

// For Seller relationship  
public function getSeller()
{
    return $this->belongsTo(Supplier::class, 'user_id');
}

// For product Category 
public function productcategory()
{
    return $this->belongsTo(Category::class, 'category_id');
}

// For product Category 
public function servicecategory()
{
    return $this->belongsTo(ServiceCategory::class, 'category_id');
}


public function getCategoryAttribute()
{
    return $this->category_type == 'product'
        ? $this->productcategory
        : $this->servicecategory;
}

  
  
}
