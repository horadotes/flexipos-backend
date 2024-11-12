<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class PaymentCheque extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'bank',
        'cheque_number',
        'cheque_date',
        'cheque_voucher_number',
        'amount',
    ];

    protected static function booted()
    {
        static::created(function ($paymentCheque) {
            $salesinvoice = $paymentCheque->salesinvoice;
            if ($salesinvoice) {
                $salesinvoice->amount -= $paymentCheque->amount;
                $salesinvoice->save();
                Log::info("Amount decreased by +{$paymentCheque->amount} for bill ID: {$salesinvoice->id}");
            }
        });

        static::updating(function ($paymentCheque) {
            $salesinvoice = $paymentCheque->salesinvoice;
            if ($salesinvoice) {
                $originalQuantity = $paymentCheque->getOriginal('amount');
                $quantityDifference = $paymentCheque->amount - $originalQuantity;
                $salesinvoice->amount += $quantityDifference;
                $salesinvoice->save();
                Log::info("Amount adjusted by +{$quantityDifference} for Product ID: {$salesinvoice->id}");
            }
        });
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
