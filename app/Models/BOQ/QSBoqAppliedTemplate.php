<?php

namespace App\Models\BOQ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QSBoqAppliedTemplate extends Model
{
    use HasFactory;

    protected $table = 'qs_boq_applied_templates';

    protected $guarded = ['id'];

    public function template()
    {
        return $this->belongsTo(BoqTemplate::class, 'template_id');
    }
}
