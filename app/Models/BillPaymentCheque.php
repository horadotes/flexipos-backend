<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BillPaymentCheque extends Model
{
    use HasFactory;

    protected $fillable = [
        'bills_payment_id',
        'bank_id',
        'cheque_number',
        'cheque_date',
        'check_voucher_no',
        'amount',
    ];

    public function billsPayment(): BelongsTo
    {
        return $this->belongsTo(BillPayment::class);
    }

    // public function bank(): BelongsTo
    // {
    //     return $this->belongsTo(Bank::class);
    // }
}
