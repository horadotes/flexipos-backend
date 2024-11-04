<?php

namespace App\Repository;

use App\Interface\Repository\BillDetailRepositoryInterface;
use App\Models\BillDetail;

class BillDetailRepository implements BillDetailRepositoryInterface
{
    public function findMany()
    {
        return BillDetail::all();
    }

    public function findOneById(int $id)
    {
        return BillDetail::findOrFail($id);
    }

    public function create(object $payload)
    {
        $billDetail = new BillDetail();
        $billDetail->bill_id = $payload->bill_id;
        $billDetail->product_id = $payload->product_id;
        $billDetail->unit = $payload->unit;
        $billDetail->expiry_date = $payload->expiry_date;
        $billDetail->quantity = $payload->quantity;
        $billDetail->price = $payload->price;
        $billDetail->save();

        return $billDetail->fresh();
    }

    public function update(object $payload, int $id)
    {
        $billDetail = BillDetail::findOrFail($id);
        $billDetail->bill_id = $payload->bill_id;
        $billDetail->product_id = $payload->product_id;
        $billDetail->unit = $payload->unit;
        $billDetail->expiry_date = $payload->expiry_date;
        $billDetail->quantity = $payload->quantity;
        $billDetail->price = $payload->price;
        $billDetail->save();

        return $billDetail->fresh();
    }

    public function delete(int $id)
    {
        $billDetail = BillDetail::findOrFail($id);

        $billDetail->delete();

        return true;
    }
}
