<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\ServiceCategory;

class SupplierPurchasedCategory extends Model
{
  use HasFactory;

  protected $table = 'cpr_supplier_purchased _categories';

  protected $guarded = ['id'];

  public function supplier(): BelongsTo
  {
    return $this->belongsTo(Supplier::class, 'supplier_id');
  }

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class, 'category_id');
  }
  
  public function serviceCategory(): BelongsTo
  {
    return $this->belongsTo(ServiceCategory::class, 'category_id');
  }
}