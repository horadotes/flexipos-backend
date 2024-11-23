<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryAdjustment extends Model
{
    use HasFactory;

    protected $fillable = [
        'prepared_by_id',
        'approved_by_id',
        'cancelled_by_id',
        'branch_number',
        'adjustment_date',
        'remarks',
        'is_cancelled',
    ];

    public function casts(): array
    {
        return [
            'is_cancelled' => 'boolean',
        ];
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
}
