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
        'supplier_id',
        'processed_by_id',
        'return_date',
        'status',
    ];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function processed_by(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'id');
    }

    public function supplier_return_details(): HasMany
    {
        return $this->hasMany(SupplierReturnDetail::class);
    }
}
