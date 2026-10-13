<?php

namespace App\Models\Ticket;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
  use HasFactory;

  protected $table = 'cpr_tickets';

  protected $guarded = ['id'];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function images(): HasMany
  {
    return $this->hasMany(TicketImage::class, 'ticket_id');
  }
}
