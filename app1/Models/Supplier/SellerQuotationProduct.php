<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ecommerce\Product;
use App\Models\Customer\RfqProduct;

class SellerQuotationProduct extends Model
{
    use HasFactory;
    protected $table = "seller_quotation_products";
   protected $guarded = ['id'];

   public function product()
  {
    return $this->belongsTo(Product::class, 'product_id');
  }
  
  public function relatedRfqProduct()
  {
    return $this->belongsTo(RfqProduct::class, 'rfq_product_id');
  }
  
  
}
