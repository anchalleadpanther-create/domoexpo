<?php

namespace App\Models\Extensions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Extensions\Blog;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
  use HasFactory;

  protected $table = 'cpr_blog_categories';

  protected $guarded = ['id'];

  public function mappedBlogs(): HasMany
  {
    return $this->hasMany(Blog::class, 'category_id');
  }
}
