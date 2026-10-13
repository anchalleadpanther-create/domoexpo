<?php

namespace App\Models\Extensions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Extensions\DropdownValue;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dropdown extends Model
{
  use HasFactory;

  protected $table = 'cpr_dropdowns';
  
  protected $guarded = ['id'];

  public function dropdownValues(): HasMany
  {
    return $this->hasMany(DropdownValue::class, 'dropdown_id', 'id');
  }

}
