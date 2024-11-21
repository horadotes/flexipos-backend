<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
