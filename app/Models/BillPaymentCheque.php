<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

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

    protected static function booted()
    {
        static::created(function ($billPaymentCheque) {
            $bill = $billPaymentCheque->bill;
            if ($bill) {
                $bill->amount -= $billPaymentCheque->amount;
                $bill->save();
                Log::info("Amount decreased by +{$billPaymentCheque->amount} for bill ID: {$bill->id}");
            }
        });

        static::updating(function ($billPaymentCheque) {
            $bill = $billPaymentCheque->bill;
            if ($bill) {
                $originalQuantity = $billPaymentCheque->getOriginal('amount');
                $quantityDifference = $billPaymentCheque->amount - $originalQuantity;
                $bill->amount += $quantityDifference;
                $bill->save();
                Log::info("Amount adjusted by +{$quantityDifference} for Product ID: {$bill->id}");
            }
        });
    }

    // public function bank(): BelongsTo
    // {
    //     return $this->belongsTo(Bank::class);
    // }
}
