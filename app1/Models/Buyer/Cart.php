<?php

namespace App\Models\Buyer;

use App\Models\Buyer\Buyer;
use App\Models\Buyer\Order;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Product;
use App\Models\Supplier\Supplier;
use App\Models\Supplier\SupplierOrder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ecommerce\ProductTypeValue;
use App\Models\Supplier\SupplierOrderStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  protected $table = 'cpr_carts';

  protected $appends = ['ProductImageWithPath', 'Stock', 'OrderStatus'];

  protected $casts = [
    'accepted_at' => 'datetime',
    'packed_at' => 'datetime',
    'shipped_at' => 'datetime',
    'delivered_at' => 'datetime',
    'cancelled_at' => 'datetime',
    'gift_card_data' => 'array',
  ];

  public function getOrderStatusAttribute()
  {
    if ($this->status === 0) {
      return 'Order Placed';
    } elseif ($this->status === 1) {
      return 'Order Accepted';
    } elseif ($this->status === 2) {
      return 'Order Packed';
    } elseif ($this->status === 3) {
      return 'Order Ready to Ship';
    } elseif ($this->status === 4) {
      return 'Order Shipped';
    } elseif ($this->status === 5) {
      return 'Order Delivered';
    } elseif ($this->status === 6) {
      return 'Order Cancelled';
    } elseif ($this->status === 7) {
      return 'Order Returned';
    } elseif ($this->status === 8) {
      return 'Order Pending';
    }
  }

  public function getProductImageWithPathAttribute()
  {
    $path = asset('/copro/public');
    return "{$path}/uploads/products/{$this->product_image}";
  }

  public function productTypeValueOne(): BelongsTo
  {
    return $this->belongsTo(ProductTypeValue::class, 'type_value_id_1');
  }

  public function productTypeValueTwo(): BelongsTo
  {
    return $this->belongsTo(ProductTypeValue::class, 'type_value_id_2');
  }

  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class, 'product_id');
  }

  public function brand()
  {
    return $this->belongsTo(Brand::class, 'brand_id');
  }

  public function seller(): BelongsTo
  {
    return $this->belongsTo(Supplier::class, 'seller_id');
  }

  public function buyer(): BelongsTo
  {
    return $this->belongsTo(Buyer::class, 'buyer_id');
  }

  public function getStockAttribute()
  {
    return $this->product()->value('stock');
  }

  public function orderItemDetail(): HasOne
  {
    return $this->hasOne(SupplierOrder::class, 'cart_item_id');
  }

  public function activities(): HasMany
  {
    return $this->hasMany(SupplierOrderStatus::class, 'supplier_order_id', 'supplier_order_id')->latest();
  }

  public function gstAmount(): Attribute
  {
    return Attribute::make(
      get: fn () => ($this->price_unit / (1 + ((int)$this->gst / 100))) * $this->quantity,
    );
    // ($this->price_unit * $this->quantity) / (1 + ((int)$this->gst / 100)),
  }

  public function gstAmountWithoutQuantity(): Attribute
  {
    return Attribute::make(
      get: fn () => ($this->price_unit / (1 + ((int)$this->gst / 100))),
    );
  }
}
