<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Buyer\Buyer;
use App\Models\Supplier\Supplier;
use App\Models\Product\Product;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'cpr_ratings';

    protected $guarded = ['id'];

    protected $casts = [
        'images' => 'array',
    ];

    /**
     * Review given by Buyer
     */
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(Buyer::class, 'user_id');
    }

    /**
     * Review given by Supplier
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'user_id');
    }

    /**
     * Get reviewer
     */
    public function getUserAttribute()
    {
        return $this->user_type === 'Supplier' ? $this->supplier : $this->buyer;
    }

    /**
     * Review target relationships
     */
    public function reviewSupplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'product_id');
    }

    public function reviewBuyer(): BelongsTo
    {
        return $this->belongsTo(Buyer::class, 'product_id');
    }

    public function reviewProduct(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Get review target
     */
    public function getReviewForAttribute()
    {
        if ($this->type === 'Supplier') {
            return $this->reviewSupplier;
        }

        if ($this->type === 'Product') {
            return $this->reviewProduct;
        }

        return $this->reviewBuyer;
    }
}





