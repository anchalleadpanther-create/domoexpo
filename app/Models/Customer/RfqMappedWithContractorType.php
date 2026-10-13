<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Customer\RequestForQuotation;
use App\Models\Ecommerce\Product;

class RfqMappedWithContractorType extends Model
{
  use HasFactory;

  protected $table = 'rfq_mapped_with_contractor_types';

  protected $guarded = ['id'];

  public function rfq(): BelongsTo
  {
    return $this->belongsTo(RequestForQuotation::class, 'rfq_id');
  }
  

}
