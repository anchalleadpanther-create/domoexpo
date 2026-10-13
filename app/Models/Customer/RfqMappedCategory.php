<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Customer\RequestForQuotation;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\ServiceCategory;

class RfqMappedCategory extends Model
{
  use HasFactory;

  protected $table = 'cpr_rfq_mapped_categories';

  protected $guarded = ['id'];

  public function rfq(): BelongsTo
  {
    return $this->belongsTo(RequestForQuotation::class, 'rfq_id');
  }

//   public function category(): BelongsTo
//   {
//     return $this->belongsTo(Category::class, 'category_id');
//   }
  
   public function category()
    {
        return $this->category_type === 'product'
            ? $this->belongsTo(Category::class, 'category_id')
            : $this->belongsTo(ServiceCategory::class, 'category_id');
    }
}
