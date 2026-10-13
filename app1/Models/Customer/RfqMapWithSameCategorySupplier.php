<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\ServiceCategory;
use App\Models\Buyer\Buyer;
use App\Models\Customer\RfqProduct;
use App\Models\Supplier\SellerQuotation;

class RfqMapWithSameCategorySupplier extends Model
{
    use HasFactory;

    protected $table = 'rfq_mapped_with_same_category_suppliers';
    protected $guarded = ['id'];
    
    public function customer(){
       return  $this->belongsTo(Buyer::class,'buyer_id');
    }

    public function RfqProducts(){
        return $this->hasMany(RfqProduct::class,'rfq_id');
    }
    

}
