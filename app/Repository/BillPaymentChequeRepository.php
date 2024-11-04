<?php

namespace App\Repository;

use App\Interface\Repository\BillPaymentChequeRepositoryInterface;
use App\Models\BillPaymentCheque;

class BillPaymentChequeRepository implements BillPaymentChequeRepositoryInterface
{
    public function findMany()
    {
        return BillPaymentCheque::all();
    }

    public function findOneById(int $id)
    {
        return BillPaymentCheque::findOrFail($id);
    }

    public function create(object $payload)
    {
        $billPaymentCheque = new BillPaymentCheque();
        $billPaymentCheque->bills_payment_id = $payload->bills_payment_id;
        $billPaymentCheque->bank_id = $payload->bank_id;
        $billPaymentCheque->cheque_number = $payload->cheque_number;
        $billPaymentCheque->cheque_date = $payload->cheque_date;
        $billPaymentCheque->check_voucher_no = $payload->check_voucher_no;
        $billPaymentCheque->amount = $payload->amount;
        $billPaymentCheque->save();

        return $billPaymentCheque->fresh();
    }

    public function update(object $payload, int $id)
    {
        $billPaymentCheque = BillPaymentCheque::findOrFail($id);
        $billPaymentCheque->bills_payment_id = $payload->bills_payment_id;
        $billPaymentCheque->bank_id = $payload->bank_id;
        $billPaymentCheque->cheque_number = $payload->cheque_number;
        $billPaymentCheque->cheque_date = $payload->cheque_date;
        $billPaymentCheque->check_voucher_no = $payload->check_voucher_no;
        $billPaymentCheque->amount = $payload->amount;
        $billPaymentCheque->save();

        return $billPaymentCheque->fresh();
    }

    public function delete(int $id)
    {
        $billPaymentCheque = BillPaymentCheque::findOrFail($id);

        $billPaymentCheque->delete();

        return true;
    }
}
