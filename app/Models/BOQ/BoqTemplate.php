<?php

namespace App\Models\BOQ;

use App\Models\Buyer\Buyer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoqTemplate extends Model
{
    use HasFactory;

    protected $table = 'boq_templates';

    protected $guarded = ['id'];

    public function categories()
    {
        return $this->hasMany(BoqTemplateCategory::class, 'template_id')->orderBy('sort_order');
    }

    public function creator()
    {
        return $this->belongsTo(Buyer::class, 'created_by_user_id');
    }
}
