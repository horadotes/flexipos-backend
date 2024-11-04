<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class BillDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'bill_id',
        'product_id',
        'unit',
        'expiry_date',
        'quantity',
        'price',
    ];

    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected static function booted()
    {
        static::created(function ($billDetail) {
            $product = $billDetail->product;
            if ($product) {
                $product->quantity_onhand += $billDetail->quantity;
                $product->current_price = $billDetail->price;
                $product->expiry_date = $billDetail->expiry_date;
                $product->save();
                Log::info("Quantity on hand increased by +{$billDetail->quantity} for Product ID: {$product->id}");
            }
        });

        static::updating(function ($billDetail) {
            $product = $billDetail->product;
            if ($product) {
                $originalQuantity = $billDetail->getOriginal('quantity');
                $quantityDifference = $billDetail->quantity - $originalQuantity;
                $product->quantity_onhand += $quantityDifference;
                $product->current_price = $billDetail->price;
                $product->expiry_date = $billDetail->expiry_date;
                $product->save();
                Log::info("Quantity on hand adjusted by +{$quantityDifference} for Product ID: {$product->id}");
            }
        });
    }
}
