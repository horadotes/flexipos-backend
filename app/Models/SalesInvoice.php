<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class SalesInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'sales_order_id',
        'customer_id',
        'prepared_by_id',
        'sales_representative',
        'cancelled_by_id',
        'approved_by_id',
        'invoice_no',
        'document_no',
        'date',
        'due_date',
        'terms',
        'is_cancelled',
        'is_approved',
        'remarks',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sales_invoice) {
            $sales_invoice->document_no = self::generateInvoiceRefDocNo();
        });
    }

    private static function generateInvoiceRefDocNo()
    {
        // Generate a unique OR number, e.g., using current date in mm/dd/yyyy format and current timestamp
        $date = now()->format('m/d/Y');
        $timestamp = now()->format('His');

        return 'SI-'.$date.'-'.$timestamp.'-'.rand(1000, 9999);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function sales_order(): BelongsTo
    {
        return $this->belongsTo(SalesOrder::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function cancel(): MorphTo
    {
        return $this->morphTo();
    }

    public function approve(): MorphTo
    {
        return $this->morphTo();
    }

    public function sales_representative(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function sales_invoice_detail(): HasMany
    {
        return $this->hasMany(SalesInvoiceDetail::class);
    }
}
