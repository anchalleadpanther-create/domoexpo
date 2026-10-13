<?php

namespace App\Models\BOQ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BOQ\BoqQuotation;
use App\Models\Ecommerce\Product;
use App\Models\Buyer\Buyer;

class BoqMappedWithArchitect extends Model
{
  use HasFactory;

  protected $table = 'boq_mapped_with_architects';

  protected $guarded = ['id'];

  public function boq(): BelongsTo
  {
    return $this->belongsTo(BoqQuotation::class, 'boq_id');
  }
  
  public function architect(): BelongsTo
  {
    return $this->belongsTo(Buyer::class, 'architect_id');
  }
  

}
