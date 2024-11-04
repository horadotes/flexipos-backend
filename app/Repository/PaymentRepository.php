<?php

namespace App\Repository;

use App\Interface\Repository\PaymentRepositoryInterface;
use App\Models\Payment;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function findMany()
    {
        return Payment::all();
    }

    public function findOneById(int $id)
    {
        return Payment::findOrFail($id);
    }

    public function create(object $payload)
    {
        $payment = new Payment();
        $payment->prepared_by_id = $payload->prepared_by_id;
        $payment->or_number = $payload->or_number;
        $payment->customer_id = $payload->customer_id;
        $payment->is_approved = $payload->is_approved;
        $payment->is_cancelled = $payload->is_cancelled;
        $payment->payment_date = $payload->payment_date;
        $payment->cancelled_by_id = $payload->cancelled_by_id;
        $payment->approvedby = $payload->approvedby;
        $payment->remarks = $payload->remarks;
        $payment->save();

        return $payment->fresh();
    }

    public function update(object $payload, int $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->prepared_by_id = $payload->prepared_by_id;
        $payment->or_number = $payload->or_number;
        $payment->customer_id = $payload->customer_id;
        $payment->is_approved = $payload->is_approved;
        $payment->is_cancelled = $payload->is_cancelled;
        $payment->payment_date = $payload->payment_date;
        $payment->cancelled_by_id = $payload->cancelled_by_id;
        $payment->approvedby = $payload->approvedby;
        $payment->remarks = $payload->remarks;
        $payment->save();

        return $payment->fresh();
    }

    public function delete(int $id)
    {
        $payment = Payment::findOrFail($id);

        $payment->delete();

        return true;
    }
}
