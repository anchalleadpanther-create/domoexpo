<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketImage extends Model
{
  use HasFactory;

  protected $table = 'cpr_ticket_images';

  protected $guarded = ['id'];
}
