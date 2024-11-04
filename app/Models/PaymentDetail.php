<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'product_id',
        'quantity',
        'payment_method_id',
        'bank_id',
        'cheque_number',
        'cheque_date',
        'amount',
        'sales_invoice_no',
    ];

    protected static function booted()
    {
        static::created(function ($paymentDetail) {
            $product = $paymentDetail->product;
            if ($product) {
                $product->quantity_onhand -= $paymentDetail->quantity;
                $product->save();
            }
        });
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function payment_method(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    // public function bank(): BelongsTo
    // {
    //     return $this->belongsTo(Bank::class);
    // }`
}
