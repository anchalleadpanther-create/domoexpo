<?php

namespace App\Models\Ecommerce;

use App\Models\Ecommerce\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomTailoredProductEnquiry extends Model
{
  use HasFactory;

  protected $table = 'cpr_custom_tailored_queries';

  protected $guarded = ['id'];

  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class, 'product_id');
  }
}
