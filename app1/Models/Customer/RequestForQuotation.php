<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\ServiceCategory;
use App\Models\Buyer\Buyer;
use App\Models\Customer\RfqProduct;
use App\Models\Supplier\SellerQuotation;
use App\Models\Extension\City;
use App\Models\Extension\State;
use App\Models\Extension\Country;

class RequestForQuotation extends Model
{
    use HasFactory;

    protected $table = 'request_for_quotations';
    protected $guarded = ['id'];
    
     public function customer(){
       return  $this->belongsTo(Buyer::class,'buyer_id');
    }

    public function RfqProducts(){
        return $this->hasMany(RfqProduct::class,'rfq_id');
    }
    
    public function receivedSellerQuotationRequest(){
        return $this->hasMany(SellerQuotation::class,'rfq_id');
    }

    public function productCategories()
    {
        return $this->belongsToMany(Category::class, 'cpr_rfq_mapped_categories', 'rfq_id', 'category_id')
                    ->wherePivot('category_type', 'product')
                    ->withPivot('category_type')
                    ->orderBy('category_id');
    }
    
    public function serviceCategories()
    {
        return $this->belongsToMany(ServiceCategory::class, 'cpr_rfq_mapped_categories', 'rfq_id', 'category_id')
                    ->wherePivot('category_type', 'service')
                    ->withPivot('category_type')
                    ->orderBy('category_id');
    }
    
    // Optional: Create a custom accessor to get all mapped categories with their specific types
    
    public function getMappedCategoriesAttribute()
    {
        // Load both relationships and merge them as needed
        return $this->productCategories->merge($this->serviceCategories);
    }
    
    
      public function deliveryCountry(): BelongsTo
      {
        return $this->belongsTo(Country::class, 'country');
      }
    
      public function deliveryState(): BelongsTo
      {
        return $this->belongsTo(State::class, 'state');
      }
    
      public function deliveryCity(): BelongsTo
      {
        return $this->belongsTo(City::class, 'city');
      }

}
