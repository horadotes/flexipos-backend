<?php

namespace App\Repository;

use App\Models\SupplierReturnDetail;
use Illuminate\Database\Eloquent\Collection;

class SupplierReturnDetailRepository
{
    public function findMany(): Collection
    {
        return SupplierReturnDetail::all();
    }

    public function findOneById(int $id): SupplierReturnDetail
    {
        return SupplierReturnDetail::findOrFail($id);
    }

    public function create(object $payload): SupplierReturnDetail
    {
        $supplierReturnDetail = new SupplierReturnDetail();
        $supplierReturnDetail->supplier_return_number = $payload->supplier_return_number;
        $supplierReturnDetail->product_id = $payload->product_id;
        $supplierReturnDetail->unit = $payload->unit;
        $supplierReturnDetail->expiry_date = $payload->expiry_date;
        $supplierReturnDetail->quantity = $payload->quantity;
        $supplierReturnDetail->price = $payload->price;
        $supplierReturnDetail->save();

        return $supplierReturnDetail->fresh();
    }

    public function update(object $payload, int $id): SupplierReturnDetail
    {
        $supplierReturnDetail = SupplierReturnDetail::findOrFail($id);
        $supplierReturnDetail->supplier_return_number = $payload->supplier_return_number;
        $supplierReturnDetail->product_id = $payload->product_id;
        $supplierReturnDetail->unit = $payload->unit;
        $supplierReturnDetail->expiry_date = $payload->expiry_date;
        $supplierReturnDetail->quantity = $payload->quantity;
        $supplierReturnDetail->price = $payload->price;
        $supplierReturnDetail->save();

        return $supplierReturnDetail->fresh();
    }

    public function delete(int $id): bool
    {
        $supplierReturnDetail = SupplierReturnDetail::findOrFail($id);
        $supplierReturnDetail->delete();

        return true;
    }
}
