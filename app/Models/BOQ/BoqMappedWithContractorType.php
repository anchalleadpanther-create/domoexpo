<?php

namespace App\Models\BOQ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BOQ\BoqQuotation;
use App\Models\Ecommerce\Product;

class BoqMappedWithContractorType extends Model
{
  use HasFactory;

  protected $table = 'boq_mapped_with_contractor_types';

  protected $guarded = ['id'];

  public function boq(): BelongsTo
  {
    return $this->belongsTo(BoqQuotation::class, 'boq_id');
  }
  

}
