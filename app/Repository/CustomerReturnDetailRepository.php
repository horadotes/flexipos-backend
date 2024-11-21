<?php

namespace App\Repository;

use App\Interface\Repository\CustomerReturnDetailRepositoryInterface;
use App\Models\CustomerReturnDetail;

class CustomerReturnDetailRepository implements CustomerReturnDetailRepositoryInterface
{
    public function findMany()
    {
        return CustomerReturnDetail::all();
    }

    public function findOneById(int $id)
    {
        return CustomerReturnDetail::findOrFail($id);
    }

    public function create(object $payload)
    {
        $customerReturnDetail = new CustomerReturnDetail();
        $customerReturnDetail->customer_return_id = $payload->customer_return_id;
        $customerReturnDetail->customer_return_number = $payload->customer_return_number;
        $customerReturnDetail->product_id = $payload->product_id;
        $customerReturnDetail->unit = $payload->unit;
        $customerReturnDetail->expiry_date = $payload->expiry_date;
        $customerReturnDetail->quantity = $payload->quantity;
        $customerReturnDetail->price = $payload->price;
        $customerReturnDetail->save();

        return $customerReturnDetail->fresh();
    }

    public function update(object $payload, int $id)
    {
        $customerReturnDetail = CustomerReturnDetail::findOrFail($id);
        $customerReturnDetail->customer_return_id = $payload->customer_return_id;
        $customerReturnDetail->customer_return_number = $payload->customer_return_number;
        $customerReturnDetail->product_id = $payload->product_id;
        $customerReturnDetail->unit = $payload->unit;
        $customerReturnDetail->expiry_date = $payload->expiry_date;
        $customerReturnDetail->quantity = $payload->quantity;
        $customerReturnDetail->price = $payload->price;
        $customerReturnDetail->save();

        return $customerReturnDetail->fresh();
    }

    public function delete(int $id)
    {
        $customerReturnDetail = CustomerReturnDetail::findOrFail($id);
        $customerReturnDetail->delete();

        return true;
    }
}
