<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Customer\RequestForQuotation;
use App\Models\Ecommerce\Product;

class CategoryMappedRfqItem extends Model
{
  use HasFactory;

  protected $table = 'category_mapped_rfq_items';

  protected $guarded = ['id'];

  public function rfqItem(): BelongsTo
  {
    return $this->belongsTo(RequestForQuotation::class, 'rfq_id');
  }
  

}
