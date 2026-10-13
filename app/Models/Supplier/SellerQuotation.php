<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer\RequestForQuotation;
use App\Models\Customer\MapSupplierToRfq;
use App\Models\Buyer\Buyer;

class SellerQuotation extends Model
{
    use HasFactory;
    protected $table = "seller_quotations";
    protected $guarded = ['id'];

    public function quotationProducts(){
        return $this->hasMany(SellerQuotationProduct::class,'seller_quotation_id');
    }

    public function seller(){
        return $this->belongsTo(Supplier::class,'seller_id');
    }
    
    public function rfq(){
        return $this->belongsTo(RequestForQuotation::class,'rfq_id');
    }
    
    
   public function mappedContractor()
   {
    return $this->belongsTo(Buyer::class, 'contractor_id');
   }
   
}
