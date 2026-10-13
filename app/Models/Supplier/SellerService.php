<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Supplier\SellerServiceMappedCategory;
use App\Models\Ecommerce\ServiceCategory;
use App\Models\Extensions\DropdownValue;
use App\Models\Ecommerce\ServiceImage;


class SellerService extends Model
{
    use HasFactory;

    protected $table = 'seller_services';
    protected $guarded = ['id'];

  public function children(): HasMany
  {
    return $this->hasMany(Category::class, 'parent_id')->with('children');
  }

  public function parent(): BelongsTo
  {
    return $this->belongsTo(Category::class, 'parent_id');
  }

  
  public function seller(): BelongsTo
  {
    return $this->belongsTo(Supplier::class, 'seller_id');
  }


  public function mappedServiceCategories(): BelongsToMany
  {
    return $this->belongsToMany(ServiceCategory::class, 'cpr_service_mapped_categories', 'service_id', 'category_id')->orderBy('category_id');
  } 

  public function mappedServiceLabels(): BelongsToMany
  {
    return $this->belongsToMany(DropdownValue::class, 'service_labels_mapped_seller_services', 'seller_service_id', 'dropdown_id');
  } 

  public function images(): HasMany
  {
    return $this->hasMany(ServiceImage::class, 'service_id')->orderBy('sort');
  }
}
