<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Extension\Country;


class SupplierClientTestimonial extends Model
{
    use HasFactory;
    protected $table = "cpr_supplier_client_testimonials";
    protected $guarded = ['id'];

    public function getClientCountry(){
        return $this->belongsTo(Country::class,'client_country');
    }
}
