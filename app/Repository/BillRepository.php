<?php

namespace App\Repository;

use App\Interface\Repository\BillRepositoryInterface;
use App\Models\Bill;

class BillRepository implements BillRepositoryInterface
{
    public function findMany()
    {
        return Bill::all();
    }

    public function findOneById(int $id)
    {
        return Bill::findOrFail($id);
    }

    public function create(object $payload)
    {
        $bill = new Bill();
        $bill->supplier_id = $payload->supplier_id;
        $bill->prepared_by_id = $payload->prepared_by_id;
        $bill->cancelled_by_id = $payload->cancelled_by_id;
        $bill->purchase_order_no = $payload->purchase_order_no;
        $bill->bill_date = $payload->bill_date;
        $bill->amount = $payload->amount;
        $bill->payment_terms = $payload->payment_terms;
        $bill->is_cancelled = $payload->is_cancelled;
        $bill->save();

        return $bill->fresh();
    }

    public function update(object $payload, int $id)
    {
        $bill = Bill::findOrFail($id);
        $bill->supplier_id = $payload->supplier_id;
        $bill->prepared_by_id = $payload->prepared_by_id;
        $bill->cancelled_by_id = $payload->cancelled_by_id;
        $bill->purchase_order_no = $payload->purchase_order_no;
        $bill->bill_date = $payload->bill_date;
        $bill->amount = $payload->amount;
        $bill->payment_terms = $payload->payment_terms;
        $bill->is_cancelled = $payload->is_cancelled;
        $bill->save();

        return $bill->fresh();
    }

    public function delete(int $id)
    {
        $bill = Bill::findOrFail($id);

        $bill->delete();

        return true;
    }
}
