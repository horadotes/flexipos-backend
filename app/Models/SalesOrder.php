<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'processed_by_id',
        'customer_id',
        'date',
        'total_amount',
        'discount',
        'tax_amount',
    ];

    public function processed_by(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'id');
    }
}
