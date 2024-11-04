<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BillPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'prepared_by_id',
        'approved_by_id',
        'cancelled_by_id',
        'payment_date',
        'payment_type',
        'cash_voucher_no',
        'is_cancelled',
    ];

    public function casts(): array
    {
        return [
            'is_cancelled' => 'boolean',
        ];
    }

    public function prepared_by(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'prepared_by_id');
    }

    public function approved_by(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'approved_by_id');
    }

    public function cancelled_by(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'cancelled_by_id');
    }

    public function billsPaymentDetail(): HasMany
    {
        return $this->hasMany(BillPaymentDetail::class);
    }
}
