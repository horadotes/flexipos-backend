<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class CreditMemo extends Model
{
    use HasFactory;

    protected $fillable = [
        'prepared_by_id',
        'cancelled_by_id',
        'customer_id',
        'sales_representative_id',
        'credit_type',
        'invoice_no',
        'sales_invoice_document_no',
        'date',
        'amount',
        'remarks',
        'is_cancelled',
    ];

    public function casts(): array
    {
        return [
            'is_cancelled' => 'boolean',
        ];
    }

    protected static function booted()
    {
        static::created(function ($creditMemo) {
            // Find the SalesInvoice by invoice_no
            $salesInvoice = \App\Models\SalesInvoice::where('document_no', $creditMemo->sales_invoice_document_no)->first();

            if ($salesInvoice) {
                // Decrease the amount in the SalesInvoice by the credit memo amount
                $salesInvoice->amount -= $creditMemo->amount;
                $salesInvoice->save();
                Log::info("Amount decreased by {$creditMemo->amount} for invoice no: {$salesInvoice->invoice_no}");
            } else {
                Log::error("Sales invoice not found for credit memo ID: {$creditMemo->id} with document_no: {$creditMemo->sales_invoice_document_no}");
            }
        });

        static::updating(function ($creditMemo) {
            // Find the SalesInvoice by invoice_no
            $salesInvoice = \App\Models\SalesInvoice::where('document_no', $creditMemo->sales_invoice_document_no)->first();

            if ($salesInvoice) {
                // Calculate the difference between the updated and original amount
                $originalAmount = $creditMemo->getOriginal('amount');
                $amountDifference = $creditMemo->amount - $originalAmount;

                // Adjust the SalesInvoice amount
                $salesInvoice->amount += $amountDifference;
                $salesInvoice->save();

                Log::info("Amount adjusted by {$amountDifference} for invoice no: {$salesInvoice->document_no}");
            } else {
                Log::error("Sales invoice not found for updating credit memo ID: {$creditMemo->id} with document_no: {$creditMemo->sales_invoice_document_no}");
            }
        });
    }

    public function prepared_by_id(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function cancelled_by_id(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function sales_representative(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
