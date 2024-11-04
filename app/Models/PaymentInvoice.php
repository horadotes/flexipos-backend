<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'sales_invoice_id',
        'amount',
        'date',
    ];

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function sales_invoice(): BelongsTo
    {
        return $this->belongsTo(SalesInvoice::class);
    }
}
