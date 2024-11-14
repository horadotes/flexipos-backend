<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupplierReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_id',
        'prepared_by_id',
        'approved_by_id',
        'cancelled_by_id',
        'branch_no',
        'return_date',
        'remarks',
        'is_cancelled',
    ];

    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class);
    }

    public function preparedBy(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function cancelledBy(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function supplier_return_details(): HasMany
    {
        return $this->hasMany(SupplierReturnDetail::class);
    }
}
