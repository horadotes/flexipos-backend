<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

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

    protected static function booted()
    {
        static::created(function ($billPaymentDetail) {
            $bill = $billPaymentDetail->bill;
            if ($bill) {
                $bill->amount -= $billPaymentDetail->amount;
                $bill->save();
                Log::info("Amount decreased by +{$billPaymentDetail->amount} for bill ID: {$bill->id}");
            }
        });

        static::updating(function ($billPaymentDetail) {
            $bill = $billPaymentDetail->bill;
            if ($bill) {
                $originalQuantity = $billPaymentDetail->getOriginal('amount');
                $quantityDifference = $billPaymentDetail->amount - $originalQuantity;
                $bill->amount += $quantityDifference;
                $bill->save();
                Log::info("Amount adjusted by +{$quantityDifference} for Product ID: {$bill->id}");
            }
        });
    }
}
