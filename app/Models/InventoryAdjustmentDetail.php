<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryAdjustmentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_adjustment_id',
        'product_id',
        'unit',
        'expiry_date',
        'quantity',
        'remarks',
    ];

    public function inventory_adjustment(): BelongsTo
    {
        return $this->belongsTo(InventoryAdjustment::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
