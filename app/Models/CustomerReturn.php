<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'processed_by_id',
        'customer_id',
        'return_date',
        'return_status',
    ];

    public function processed_by(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function customer_return_details(): HasMany
    {
        return $this->hasMany(CustomerReturnDetail::class);
    }
}
