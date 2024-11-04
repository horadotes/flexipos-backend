<?php

namespace App\Repository;

use App\Interface\Repository\PaymentDetailRepositoryInterface;
use App\Models\PaymentDetail;
use Illuminate\Support\Facades\DB;

class PaymentDetailRepository implements PaymentDetailRepositoryInterface
{
    public function findMany()
    {
        return PaymentDetail::all();
    }

    public function findOneById(int $id)
    {
        return PaymentDetail::findOrFail($id);
    }

    public function create(object $payload)
    {
        return DB::transaction(function () use ($payload) {
            $paymentDetail = new PaymentDetail();
            $paymentDetail->payment_id = $payload->payment_id;
            $paymentDetail->product_id = $payload->product_id;
            $paymentDetail->quantity = $payload->quantity;
            $paymentDetail->payment_method_id = $payload->payment_method_id;
            $paymentDetail->bank_id = $payload->bank_id; // Uncomment if using bank relation
            $paymentDetail->cheque_number = $payload->cheque_number;
            $paymentDetail->cheque_date = $payload->cheque_date;
            $paymentDetail->amount = $payload->amount;
            $paymentDetail->sales_invoice_no = $payload->sales_invoice_no;
            $paymentDetail->save();

            return $paymentDetail->fresh();
        });
    }

    public function update(object $payload, int $id)
    {
        return DB::transaction(function () use ($payload, $id) {
            $paymentDetail = PaymentDetail::findOrFail($id);
            $paymentDetail->payment_id = $payload->payment_id;
            $paymentDetail->product_id = $payload->product_id;
            $paymentDetail->quantity = $payload->quantity;
            $paymentDetail->payment_method_id = $payload->payment_method_id;
            $paymentDetail->bank_id = $payload->bank_id; // Uncomment if using bank relation
            $paymentDetail->cheque_number = $payload->cheque_number;
            $paymentDetail->cheque_date = $payload->cheque_date;
            $paymentDetail->amount = $payload->amount;
            $paymentDetail->sales_invoice_no = $payload->sales_invoice_no;
            $paymentDetail->save();

            return $paymentDetail->fresh();
        });
    }

    public function delete(int $id)
    {
        return DB::transaction(function () use ($id) {
            $paymentDetail = PaymentDetail::findOrFail($id);
            $paymentDetail->delete();

            return true;
        });
    }
}
