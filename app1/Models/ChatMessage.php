<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
  use HasFactory;

  protected $table = 'cpr_chat_messages';

  protected $guarded = ['id'];
}
