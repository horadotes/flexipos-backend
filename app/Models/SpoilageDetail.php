<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpoilageDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'spoilage_id',
        'product_id',
        'quantity',
        'description',
        'financial_impact',
    ];

    public function spoilage(): BelongsTo
    {
        return $this->belongsTo(Spoilage::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
