<?php

namespace App\Models\Ecommerce;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ServiceCategory extends Model
{
    use HasFactory;
    
  protected $table = 'cpr_service_categories';

  protected $guarded = ['id'];
  
  public function parent(): BelongsTo
  {
    return $this->belongsTo(ServiceCategory::class, 'parent_id');
  }
  
  public function children(): HasMany
  {
    return $this->hasMany(ServiceCategory::class, 'parent_id')->with('children');
  }
  
   public function mappedBrands(): BelongsToMany
  {
    return $this->belongsToMany(Brand::class, 'cpr_brand_mapped_categories', 'category_id', 'brand_id');
  }
}
