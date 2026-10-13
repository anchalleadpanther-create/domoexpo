<?php

namespace App\Models\Buyer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BuyerMappedRestaurantOrCafeType extends Model
{
  use HasFactory;

  protected $table = 'cpr_buyers_mapped_hotel_types';

  protected $guarded = ['id'];

  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class, 'product_id');
  }

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class, 'category_id');
  }
}

