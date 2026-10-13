<?php

namespace App\Models\Customer;

use App\Models\Ecommerce\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesignerWishlist extends Model
{
  use HasFactory;

  protected $table = 'cpr_designer_wishlist';

  protected $guarded = ['id'];

  public function designer(): BelongsTo
  {
    return $this->belongsTo(Brand::class, 'designer_id');
  }
}
