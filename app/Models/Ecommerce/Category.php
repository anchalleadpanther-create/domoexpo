<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
  use HasFactory;

  protected $table = 'cpr_categories';

  protected $guarded = ['id'];

  public function mappedFilters(): BelongsToMany
  {
    return $this->belongsToMany(Filter::class, 'cpr_category_mapped_filters', 'category_id', 'filter_id');
  }

  public function mappedBrands(): BelongsToMany
  {
    return $this->belongsToMany(Brand::class, 'cpr_brand_mapped_categories', 'category_id', 'brand_id');
  }

  public function mappedProducts(): BelongsToMany
  {
    return $this->belongsToMany(Product::class, 'cpr_product_mapped_categories', 'category_id', 'product_id');
  }
  
  public function mappedSuppliers(): BelongsToMany
  {
    return $this->belongsToMany(Product::class, 'cpr_supplier_mapped_categories', 'category_id', 'supplier_id');
  }

  public function children(): HasMany
  {
    return $this->hasMany(Category::class, 'parent_id')->with('children')->orderBy('sort');
  }

  public function parent(): BelongsTo
  {
    return $this->belongsTo(Category::class, 'parent_id');
  }

  public function childrenRecursive()
  {
    return $this->children()->with('childrenRecursive');
  }

  public function getCategoryNameAttribute($value)
  {
    return ucwords($value);
  }


}
