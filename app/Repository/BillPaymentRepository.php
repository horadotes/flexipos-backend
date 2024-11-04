<?php

namespace App\Repository;

use App\Interface\Repository\BillPaymentRepositoryInterface;
use App\Models\BillPayment;

class BillPaymentRepository implements BillPaymentRepositoryInterface
{
    public function findMany()
    {
        return BillPayment::all();
    }

    public function findOneById(int $id)
    {
        return BillPayment::findOrFail($id);
    }

    public function create(object $payload)
    {
        $billPayment = new BillPayment();
        $billPayment->prepared_by_id = $payload->prepared_by_id;
        $billPayment->approved_by_id = $payload->approved_by_id;
        $billPayment->cancelled_by_id = $payload->cancelled_by_id;
        $billPayment->payment_date = $payload->payment_date;
        $billPayment->payment_type = $payload->payment_type;
        $billPayment->cash_voucher_no = $payload->cash_voucher_no;
        $billPayment->is_cancelled = $payload->is_cancelled;
        $billPayment->save();

        return $billPayment->fresh();
    }

    public function update(object $payload, int $id)
    {
        $billPayment = BillPayment::findOrFail($id);
        $billPayment->prepared_by_id = $payload->prepared_by_id;
        $billPayment->approved_by_id = $payload->approved_by_id;
        $billPayment->cancelled_by_id = $payload->cancelled_by_id;
        $billPayment->payment_date = $payload->payment_date;
        $billPayment->payment_type = $payload->payment_type;
        $billPayment->cash_voucher_no = $payload->cash_voucher_no;
        $billPayment->is_cancelled = $payload->is_cancelled;
        $billPayment->save();

        return $billPayment->fresh();
    }

    public function delete(int $id)
    {
        $billPayment = BillPayment::findOrFail($id);

        $billPayment->delete();

        return true;
    }
}
