<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesInvoiceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_invoice_id',
        'sales_invoice_ref_doc_no',
        'product_id',
        'quantity',
        'barcode',
        'unit',
        'expiry_date',
        'price',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function sales_invoice(): BelongsTo
    {
        return $this->belongsTo(SalesInvoice::class);
    }

    protected static function booted()
    {
        static::created(function ($salesInvoiceDetail) {
            $product = $salesInvoiceDetail->product;
            if ($product) {
                $product->quantity_onhand -= $salesInvoiceDetail->quantity;
                $product->save();
            }
        });
    }
}
