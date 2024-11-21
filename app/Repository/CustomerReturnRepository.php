<?php

namespace App\Repository;

use App\Interface\Repository\CustomerReturnRepositoryInterface;
use App\Models\CustomerReturn;

class CustomerReturnRepository implements CustomerReturnRepositoryInterface
{
    public function findMany()
    {
        return CustomerReturn::all();
    }

    public function findOneById(int $id)
    {
        return CustomerReturn::findOrFail($id);
    }

    public function create(object $payload)
    {
        $customerReturn = new CustomerReturn();
        $customerReturn->sales_invoice_id = $payload->sales_invoice_id;
        $customerReturn->prepared_by_id = $payload->prepared_by_id;
        $customerReturn->approved_by_id = $payload->approved_by_id;
        $customerReturn->cancelled_by_id = $payload->cancelled_by_id;
        $customerReturn->branch_number = $payload->branch_number;
        $customerReturn->customer_return_number = $payload->customer_return_number;
        $customerReturn->return_date = $payload->return_date;
        $customerReturn->remarks = $payload->remarks;
        $customerReturn->is_cancelled = $payload->is_cancelled;
        $customerReturn->save();

        return $customerReturn->fresh();
    }

    public function update(object $payload, int $id)
    {
        $customerReturn = CustomerReturn::findOrFail($id);
        $customerReturn->sales_invoice_id = $payload->sales_invoice_id;
        $customerReturn->prepared_by_id = $payload->prepared_by_id;
        $customerReturn->approved_by_id = $payload->approved_by_id;
        $customerReturn->cancelled_by_id = $payload->cancelled_by_id;
        $customerReturn->branch_number = $payload->branch_number;
        $customerReturn->customer_return_number = $payload->customer_return_number;
        $customerReturn->return_date = $payload->return_date;
        $customerReturn->remarks = $payload->remarks;
        $customerReturn->is_cancelled = $payload->is_cancelled;
        $customerReturn->save();

        return $customerReturn->fresh();
    }

    public function delete(int $id)
    {
        $customerReturn = CustomerReturn::findOrFail($id);
        $customerReturn->delete();

        return true;
    }
}
