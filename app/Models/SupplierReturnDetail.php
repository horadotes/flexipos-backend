<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class SupplierReturnDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'supplier_return_number',
        'supplier_return_id',
        'unit',
        'expiry_date',
        'quantity',
        'price',
    ];

    public function supplier_return(): BelongsTo
    {
        return $this->belongsTo(SupplierReturn::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected static function booted()
    {
        static::created(function ($supplierReturnDetail) {
            $product = $supplierReturnDetail->product;
            if ($product) {
                $product->quantity_onhand -= $supplierReturnDetail->quantity;
                $product->save();
                Log::info("Quantity on hand increased by +{$supplierReturnDetail->quantity} for Product ID: {$product->id}");
            }
        });

        static::updating(function ($supplierReturnDetail) {
            $product = $supplierReturnDetail->product;
            if ($product) {
                $originalQuantity = $supplierReturnDetail->getOriginal('quantity');
                $quantityDifference = $supplierReturnDetail->quantity - $originalQuantity;
                $product->quantity_onhand -= $quantityDifference;
                $product->save();
                Log::info("Quantity on hand adjusted by +{$quantityDifference} for Product ID: {$product->id}");
            }
        });
    }
}
