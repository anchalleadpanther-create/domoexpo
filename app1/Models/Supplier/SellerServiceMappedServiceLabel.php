<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerServiceMappedServiceLabel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "service_labels_mapped_seller_services";
}
