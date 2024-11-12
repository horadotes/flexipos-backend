<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'sales_invoice_id',
        'sales_invoice_no',
        'amount',
    ];

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function salesInvoice(): BelongsTo
    {
        return $this->belongsTo(SalesInvoice::class);
    }

    protected static function booted()
    {
        static::created(function ($paymentDetail) {
            $salesInvoice = SalesInvoice::where('invoice_no', $paymentDetail->sales_invoice_no)->first();
            if ($salesInvoice) {
                $salesInvoice->amount -= $paymentDetail->amount;
                $salesInvoice->save();
                Log::info("Amount decreased by {$paymentDetail->amount} for invoice No: {$salesInvoice->invoice_no}");
            } else {
                Log::error("Sales invoice not found for payment detail ID: {$paymentDetail->id}");
            }
        });

        static::updating(function ($paymentDetail) {
            $salesInvoice = SalesInvoice::where('invoice_no', $paymentDetail->sales_invoice_no)->first();
            if ($salesInvoice) {
                $originalAmount = $paymentDetail->getOriginal('amount');
                $amountDifference = $paymentDetail->amount - $originalAmount;
                $salesInvoice->amount += $amountDifference;
                $salesInvoice->save();
                Log::info("Amount adjusted by {$amountDifference} for invoice No: {$salesInvoice->invoice_no}");
            } else {
                Log::error("Sales invoice not found for payment detail ID: {$paymentDetail->id}");
            }
        });
    }

    // public function bank(): BelongsTo
    // {
    //     return $this->belongsTo(Bank::class);
    // }
}
