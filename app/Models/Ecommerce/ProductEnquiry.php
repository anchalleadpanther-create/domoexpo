<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductEnquiry extends Model
{
  use HasFactory;

  protected $table = 'cpr_product_enquiries';

  protected $guarded = ['id'];

  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class, 'product_id');
  }
}
