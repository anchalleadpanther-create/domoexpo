<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\ServiceCategory;
use App\Models\Buyer\Buyer;
use App\Models\Supplier\Supplier;
use App\Models\Customer\RfqProduct;
use App\Models\Supplier\SellerQuotation;

class MapSupplierToRfq extends Model
{
    use HasFactory;

    protected $table = 'cpr_mapped_suppliers_to_rfqs';
    protected $guarded = ['id'];
    
    public function contractor(){
       return  $this->belongsTo(Buyer::class,'contractor_id');
    }
    
    public function supplier(){
       return  $this->belongsTo(Buyer::class,'seller_id');
    }

    public function RfqProducts(){
        return $this->hasMany(RfqProduct::class,'rfq_id');
    }
    

}
