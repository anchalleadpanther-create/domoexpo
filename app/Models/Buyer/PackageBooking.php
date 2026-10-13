<?php

namespace App\Models\Buyer;

use App\Models\Buyer\Buyer;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageBooking extends Model
{
  use HasFactory;

  protected $table = 'cpr_package_bookings';

  protected $guarded = ['id'];

  protected $casts = [
    'date' => 'date',
    'time' => 'datetime',
  ];

  protected function email(): Attribute
  {
    return Attribute::make(
      set: fn ($value) => Str::lower($value),
    );
  }

  public function package(): BelongsTo
  {
    return $this->belongsTo(Package::class, 'package_id');
  }

  public function expert(): BelongsTo
  {
    return $this->belongsTo(Buyer::class, 'expert_id');
  }

  public function buyer(): BelongsTo
  {
    return $this->belongsTo(Buyer::class, 'user_id');
  }
}
