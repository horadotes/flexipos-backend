<?php

namespace App\Repository;

use App\Interface\Repository\BillPaymentDetailRepositoryInterface;
use App\Models\BillPaymentDetail;

class BillPaymentDetailRepository implements BillPaymentDetailRepositoryInterface
{
    public function findMany()
    {
        return BillPaymentDetail::all();
    }

    public function findOneById(int $id)
    {
        return BillPaymentDetail::findOrFail($id);
    }

    public function create(object $payload)
    {
        $billPaymentDetail = new BillPaymentDetail();
        $billPaymentDetail->bill_id = $payload->bill_id;
        $billPaymentDetail->bills_payment_id = $payload->bills_payment_id;
        $billPaymentDetail->amount = $payload->amount;
        $billPaymentDetail->save();

        return $billPaymentDetail->fresh();
    }

    public function update(object $payload, int $id)
    {
        $billPaymentDetail = BillPaymentDetail::findOrFail($id);
        $billPaymentDetail->bill_id = $payload->bill_id;
        $billPaymentDetail->bills_payment_id = $payload->bills_payment_id;
        $billPaymentDetail->amount = $payload->amount;
        $billPaymentDetail->save();

        return $billPaymentDetail->fresh();
    }

    public function delete(int $id)
    {
        $billPaymentDetail = BillPaymentDetail::findOrFail($id);

        $billPaymentDetail->delete();

        return true;
    }
}
