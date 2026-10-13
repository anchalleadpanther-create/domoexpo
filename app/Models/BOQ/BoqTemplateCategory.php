<?php

namespace App\Models\BOQ;

use App\Models\Ecommerce\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoqTemplateCategory extends Model
{
    use HasFactory;

    protected $table = 'boq_template_categories';

    protected $guarded = ['id'];

    public function template()
    {
        return $this->belongsTo(BoqTemplate::class, 'template_id');
    }

    public function items()
    {
        return $this->hasMany(BoqTemplateItem::class, 'template_category_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
