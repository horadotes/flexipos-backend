<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupplierReturnDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_return_id',
        'product_id',
        'quantity',
        'description',
        'financial_impact',
    ];

    public function supplier_return(): BelongsTo
    {
        return $this->belongsTo(SupplierReturn::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
