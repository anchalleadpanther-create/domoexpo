<?php
namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierGallaryImage extends Model
{
    use HasFactory;
    protected $table = "supplier_gallery_images";
    protected $guarded = ['id'];


    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
    
   
}
