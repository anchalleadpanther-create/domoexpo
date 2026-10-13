<?php

namespace App\Models\Buyer;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CustomerViewedProduct extends Model
{
  use HasFactory;

  protected $fillable = [
    'product_id',
    'buyer_id',
    'buyer_ip',
  ];
  protected $table = 'cpr_customer_viwed_products';
  protected $guarded = ['id'];

  public function products(): BelongsTo
  {
    return $this->belongsTo(Product::class,  'product_id'); 
  }

}
