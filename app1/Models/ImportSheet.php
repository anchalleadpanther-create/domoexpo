<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImportSheet extends Model
{
  use HasFactory;

  protected $table = 'cpr_import_sheets';

  protected $guarded = ['id'];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
}
