<?php

namespace App\Repository;

use App\Interface\Repository\PaymentChequeRepositoryInterface;
use App\Models\PaymentCheque;
use Illuminate\Support\Facades\DB;

class PaymentChequeRepository implements PaymentChequeRepositoryInterface
{
    public function findMany()
    {
        return PaymentCheque::all();
    }

    public function findOneById(int $id)
    {
        return PaymentCheque::findOrFail($id);
    }

    public function create(object $payload)
    {
        return DB::transaction(function () use ($payload) {
            $paymentCheque = new PaymentCheque();
            $paymentCheque->payment_id = $payload->payment_id;
            $paymentCheque->bank = $payload->bank;
            $paymentCheque->cheque_number = $payload->cheque_number;
            $paymentCheque->cheque_date = $payload->cheque_date;
            $paymentCheque->cheque_voucher_number = $payload->cheque_voucher_number;
            $paymentCheque->amount = $payload->amount;
            $paymentCheque->save();

            return $paymentCheque->fresh();
        });
    }

    public function update(object $payload, int $id)
    {
        return DB::transaction(function () use ($payload, $id) {
            $paymentCheque = PaymentCheque::findOrFail($id);
            $paymentCheque->payment_id = $payload->payment_id;
            $paymentCheque->bank = $payload->bank;
            $paymentCheque->cheque_number = $payload->cheque_number;
            $paymentCheque->cheque_date = $payload->cheque_date;
            $paymentCheque->cheque_voucher_number = $payload->cheque_voucher_number;
            $paymentCheque->amount = $payload->amount;
            $paymentCheque->save();

            return $paymentCheque->fresh();
        });
    }

    public function delete(int $id)
    {
        return DB::transaction(function () use ($id) {
            $paymentCheque = PaymentCheque::findOrFail($id);
            $paymentCheque->delete();

            return true;
        });
    }
}
