<?php

namespace App\Repository;

use App\Interface\Repository\SupplierReturnRepositoryInterface;
use App\Models\SupplierReturn;

class SupplierReturnRepository implements SupplierReturnRepositoryInterface
{
    public function findMany()
    {
        return SupplierReturn::all();
    }

    public function findOneById(int $id)
    {
        return SupplierReturn::findOrFail($id);
    }

    public function create(object $payload)
    {
        $supplierReturn = new SupplierReturn();
        $supplierReturn->bill_id = $payload->bill_id;
        $supplierReturn->prepared_by_id = $payload->prepared_by_id;
        $supplierReturn->approved_by_id = $payload->approved_by_id;
        $supplierReturn->cancelled_by_id = $payload->cancelled_by_id;
        $supplierReturn->branch_no = $payload->branch_no;
        $supplierReturn->return_date = $payload->return_date;
        $supplierReturn->remarks = $payload->remarks;
        $supplierReturn->is_cancelled = $payload->is_cancelled;
        $supplierReturn->save();

        return $supplierReturn->fresh();
    }

    public function update(object $payload, int $id)
    {
        $supplierReturn = SupplierReturn::findOrFail($id);
        $supplierReturn->bill_id = $payload->bill_id;
        $supplierReturn->prepared_by_id = $payload->prepared_by_id;
        $supplierReturn->approved_by_id = $payload->approved_by_id;
        $supplierReturn->cancelled_by_id = $payload->cancelled_by_id;
        $supplierReturn->branch_no = $payload->branch_no;
        $supplierReturn->return_date = $payload->return_date;
        $supplierReturn->remarks = $payload->remarks;
        $supplierReturn->is_cancelled = $payload->is_cancelled;
        $supplierReturn->save();

        return $supplierReturn->fresh();
    }

    public function delete(int $id)
    {
        $supplierReturn = SupplierReturn::findOrFail($id);
        $supplierReturn->delete();

        return true;
    }
}
