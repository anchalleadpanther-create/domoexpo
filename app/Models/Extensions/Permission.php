<?php

namespace App\Models\Extensions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
  use HasFactory;

  protected $table = 'cpr_permissions';

  protected $guarded = ['id'];

  protected $casts = [
    'permissions' => 'array',
  ];
}
