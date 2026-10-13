<?php

namespace App\Models\BOQ;

use App\Models\Ecommerce\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoqTemplateItem extends Model
{
    use HasFactory;

    protected $table = 'boq_template_items';

    protected $guarded = ['id'];

    public function templateCategory()
    {
        return $this->belongsTo(BoqTemplateCategory::class, 'template_category_id');
    }

    public function subCategoryRelation()
    {
        return $this->belongsTo(Category::class, 'sub_category');
    }

    public function subSubCategoryRelation()
    {
        return $this->belongsTo(Category::class, 'sub_sub_category');
    }
}
