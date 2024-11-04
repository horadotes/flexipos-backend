<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BillPaymentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_id',
        'bills_payment_id',
        'amount',
    ];

    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class);
    }

    public function billsPayment(): BelongsTo
    {
        return $this->belongsTo(BillPayment::class);
    }
}
