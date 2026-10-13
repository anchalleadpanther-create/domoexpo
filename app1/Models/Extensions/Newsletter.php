<?php

namespace App\Models\Extensions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
  use HasFactory;

  protected $table = 'cpr_newsletters';

  protected $guarded = ['id'];

  public function setEmailAttribute($value)
  {
    $this->attributes['email'] = strtolower($value);
  }
}
