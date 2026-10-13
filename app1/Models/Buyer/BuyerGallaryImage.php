<?php
namespace App\Models\Buyer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buyer\Buyer;


class BuyerGallaryImage extends Model
{
    use HasFactory;
    protected $table = "buyer_gallery_images";
    protected $guarded = ['id'];


    public function buyer(){
        return $this->belongsTo(Buyer::class,' buyer_id');
    }
    
   
}
