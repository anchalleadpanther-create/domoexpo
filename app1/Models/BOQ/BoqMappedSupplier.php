<?php

namespace App\Models\BOQ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BOQ\BoqQuotation;
use App\Models\Ecommerce\Product;
use App\Models\Buyer\Buyer;

class BoqMappedSupplier extends Model
{
  use HasFactory;

  protected $table = 'boq_main_item_mapped_suppliers';

  protected $guarded = ['id'];

  public function boq(): BelongsTo
  {
    return $this->belongsTo(BoqQuotation::class, 'boq_id');
  }
  
  
  public function contractor(): BelongsTo
  {
    return $this->belongsTo(Buyer::class, 'contractor_id');
  }

}
