<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Customer\RequestForQuotation;
use App\Models\Ecommerce\Product;
use App\Models\Customer\CategoryMappedRfqItem;
use App\Models\Ecommerce\Category;

class RfqProduct extends Model
{
  use HasFactory;

  protected $table = 'rfq_products';

  protected $guarded = ['id'];

  public function rfq(): BelongsTo
  {
    return $this->belongsTo(RequestForQuotation::class, 'rfq_id');
  }
  
  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class, 'product_id');
  }
  

  public function mappedCategories()
  {
    return $this->belongsToMany(Category::class, 'category_mapped_rfq_items', 'item_id', 'category_id')->orderBy('category_id');
  } 
  

}
