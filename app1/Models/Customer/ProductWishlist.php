<?php

namespace App\Models\Customer;

use App\Models\Ecommerce\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductWishlist extends Model
{
  use HasFactory;

  protected $table = 'cpr_product_wishlist';

  protected $guarded = ['id'];

  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class, 'product_id');
  }
}
