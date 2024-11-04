<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'or_number',
        'customer_id',
        'is_approved',
        'is_cancelled',
        'payment_date',
        'prepared_by_id',
        'cancelled_by_id',
        'approvedby',
        'remarks',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($payment) {
            $payment->or_number = self::generateOrNumber();
        });
    }

    private static function generateOrNumber()
    {
        // Generate a unique OR number, e.g., using current timestamp or any other logic
        return 'OR-'.now()->format('YmdHis').'-'.rand(1000, 999999);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function prepared_by(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function payment_details(): HasMany
    {
        return $this->hasMany(PaymentDetail::class);
    }
}
