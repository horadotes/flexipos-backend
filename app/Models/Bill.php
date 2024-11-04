<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'prepared_by_id',
        'cancelled_by_id',
        'purchase_order_no',
        'bill_date',
        'amount',
        'payment_terms',
        'is_cancelled',
    ];

    public function casts(): array
    {
        return [
            'is_cancelled' => 'boolean',
        ];
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function prepared_by(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'id');
    }

    public function cancelled_by(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'id');
    }

    public function billDetails()
    {
        return $this->hasMany(BillDetail::class);
    }

    protected static function booted()
    {
        static::deleting(function ($bill) {
            // Ensure billDetails are loaded
            $bill->loadMissing('billDetails');

            if ($bill->bill_details) {
                foreach ($bill->bill_details as $bill_detail) {
                    $product = $bill_detail->product;
                    if ($product) {
                        // Adjust the product's quantity before deleting the bill detail
                        $product->quantity_onhand -= $bill_detail->quantity;
                        $product->save();

                        Log::info("BillDetail ID: {$bill_detail->id} for Bill ID: {$bill->id} - Adjusted Product ID: {$product->id} quantity by -{$bill_detail->quantity}");
                    }
                }
            } else {
                Log::warning("Bill ID: {$bill->id} has no related BillDetails to process.");
            }
        });
    }
}
