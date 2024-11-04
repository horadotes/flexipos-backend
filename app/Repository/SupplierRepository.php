<?php

namespace App\Repository;

use App\Interface\Repository\SupplierRepositoryInterface;
use App\Models\Supplier;

class SupplierRepository implements SupplierRepositoryInterface
{
    public function findMany()
    {
        return Supplier::all();
    }

    public function findOneById(int $id)
    {
        return Supplier::findOrFail($id);
    }

    public function create(object $payload)
    {
        $supplier = new Supplier();
        $supplier->name = $payload->name;
        $supplier->address = $payload->address;
        $supplier->phone = $payload->phone;
        $supplier->alternate_phone = $payload->alternate_phone;
        $supplier->is_active = $payload->is_active;
        $supplier->save();

        return $supplier->fresh();
    }

    public function update(object $payload, int $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->name = $payload->name;
        $supplier->address = $payload->address;
        $supplier->phone = $payload->phone;
        $supplier->alternate_phone = $payload->alternate_phone;
        $supplier->is_active = $payload->is_active;
        $supplier->save();

        return $supplier->fresh();
    }

    public function delete(int $id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return true;
    }
}
