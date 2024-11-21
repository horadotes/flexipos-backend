<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_invoice_id',
        'prepared_by_id',
        'approved_by_id',
        'cancelled_by_id',
        'branch_number',
        'customer_return_number',
        'return_date',
        'remarks',
        'is_cancelled',
    ];

    public function sales_invoice_id(): BelongsTo
    {
        return $this->belongsTo(SalesInvoice::class);
    }

    public function prepared_by_id(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function approved_by_id(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function cancelled_by_id(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function customer_return_details(): HasMany
    {
        return $this->hasMany(CustomerReturnDetail::class);
    }
}
