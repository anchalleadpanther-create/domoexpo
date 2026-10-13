<?php
namespace App\Models;

use App\Events\AddressCreated;
use App\Models\Extension\City;
use App\Models\Extension\State;
use App\Models\Extension\Country;
use App\Models\Ecommerce\Product;
use App\Models\Supplier\Supplier;
use App\Models\Buyer\Buyer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AskForSample extends Model
{
  use HasFactory;

  protected $table = 'ask_for_samples';

  protected $guarded = ['id'];


  public function seller(): BelongsTo
  {
    return $this->belongsTo(Supplier::class, 'seller_id');
  }

  public function buyer(): BelongsTo
  {
    return $this->belongsTo(Buyer::class, 'buyer_id');
  }

  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class, 'product_id');
  }
}
