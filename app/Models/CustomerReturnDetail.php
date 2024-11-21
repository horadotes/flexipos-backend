<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class CustomerReturnDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_return_id',
        'customer_return_number',
        'product_id',
        'unit',
        'expiry_date',
        'quantity',
        'price',
    ];

    public function customer_return(): BelongsTo
    {
        return $this->belongsTo(CustomerReturn::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected static function booted()
    {
        static::created(function ($customerReturnDetail) {
            $product = $customerReturnDetail->product;
            if ($product) {
                $product->quantity_onhand += $customerReturnDetail->quantity;
                $product->save();
                Log::info("Quantity on hand increased by +{$customerReturnDetail->quantity} for Product ID: {$product->id}");
            }
        });

        static::updating(function ($customerReturnDetail) {
            $product = $customerReturnDetail->product;
            if ($product) {
                $originalQuantity = $customerReturnDetail->getOriginal('quantity');
                $quantityDifference = $customerReturnDetail->quantity - $originalQuantity;
                $product->quantity_onhand += $quantityDifference;
                $product->save();
                Log::info("Quantity on hand adjusted by +{$quantityDifference} for Product ID: {$product->id}");
            }
        });
    }
}
