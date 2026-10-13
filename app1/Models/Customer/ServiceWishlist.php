<?php

namespace App\Models\Customer;

use App\Models\Service\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceWishlist extends Model
{
  use HasFactory;

  protected $table = 'cpr_service_wishlist';

  protected $guarded = ['id'];

  public function service(): BelongsTo
  {
    return $this->belongsTo(Service::class, 'service_id');
  }
}
