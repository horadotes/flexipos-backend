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

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function salesInvoice(): BelongsTo
    {
        return $this->belongsTo(SalesInvoice::class, 'sales_invoice_id');
    }

    protected static function booted()
    {
        static::created(function ($paymentCheque) {
            $salesInvoice = $paymentCheque->salesInvoice;
            if ($salesInvoice) {
                $salesInvoice->amount -= $paymentCheque->amount;
                $salesInvoice->save();
                Log::info("Amount decreased by {$paymentCheque->amount} for invoice ID: {$salesInvoice->id}");
            } else {
                Log::error("Sales invoice not found for payment cheque ID: {$paymentCheque->id}");
            }
        });

        static::updating(function ($paymentCheque) {
            $salesInvoice = $paymentCheque->salesInvoice;
            if ($salesInvoice) {
                $originalAmount = $paymentCheque->getOriginal('amount');
                $amountDifference = $paymentCheque->amount - $originalAmount;
                $salesInvoice->amount += $amountDifference;
                $salesInvoice->save();
                Log::info("Amount adjusted by {$amountDifference} for invoice ID: {$salesInvoice->id}");
            } else {
                Log::error("Sales invoice not found for payment cheque ID: {$paymentCheque->id}");
            }
        });
    }
}
