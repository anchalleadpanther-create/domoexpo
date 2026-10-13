<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buyer\Buyer;
use App\Models\Supplier\Supplier;


class UsersSharedDocument extends Model
{
  use HasFactory;

  protected $table = 'cpr_users_shared_documents';

  protected $guarded = ['id'];
  
  
  
    public function buyerReceiver()
    {
        return $this->belongsTo(Buyer::class, 'receiver_id');
    }
    
    public function supplierReceiver()
    {
        return $this->belongsTo(Supplier::class, 'receiver_id');
    }
    
    public function getReceiverAttribute()
    {
        if (in_array($this->receiver_type, ['Buyer', 'Architect', 'Contractor', 'Developer', 'Quantity Surveyor'], true)) {
            return $this->buyerReceiver;
        }
    
        if ($this->receiver_type == 'Supplier') {
            return $this->supplierReceiver;
        }
    
        return null;
    }
    
    public function buyerSender()
    {
        return $this->belongsTo(Buyer::class, 'sender_id');
    }
    
    public function supplierSender()
    {
        return $this->belongsTo(Supplier::class, 'sender_id');
    }
    
    public function getSenderAttribute()
    {
        if (in_array($this->sender_type, ['Buyer', 'Architect', 'Contractor', 'Developer', 'Quantity Surveyor'], true)) {
            return $this->buyerSender;
        }
    
        if ($this->sender_type == 'Supplier') {
            return $this->supplierSender;
        }
    
        return null;
    }
  
  
  
}
