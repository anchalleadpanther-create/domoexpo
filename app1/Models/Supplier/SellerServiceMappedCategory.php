<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerServiceMappedCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "cpr_service_mapped_categories";

    
}
