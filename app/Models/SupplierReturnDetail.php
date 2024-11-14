<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupplierReturnDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'supplier_return_number',
        'supplier_return_id',
        'unit',
        'expiry_date',
        'quantity',
        'price',
    ];

    public function supplier_return(): BelongsTo
    {
        return $this->belongsTo(SupplierReturn::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($supplier_return_detail) {
            $supplier_return_detail->supplier_return_number = self::generateSupplierReturnNumber();
        });
    }

    private static function generateSupplierReturnNumber()
    {
        // Generate a unique OR number, e.g., using current date in mm/dd/yyyy format and current timestamp

        return 'SRN-'.rand(1000, 9999);
    }
}
