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
        $paymentDetail = new PaymentDetail();
        $paymentDetail->payment_id = $payload->payment_id;
        $paymentDetail->sales_invoice_id = $payload->sales_invoice_id;
        $paymentDetail->sales_invoice_no = $payload->sales_invoice_no;
        $paymentDetail->amount = $payload->amount;
        $paymentDetail->save();

        return $paymentDetail->fresh();
    }

    public function update(object $payload, int $id)
    {
        $paymentDetail = PaymentDetail::findOrFail($id);
        $paymentDetail->payment_id = $payload->payment_id;
        $paymentDetail->sales_invoice_id = $payload->sales_invoice_id;
        $paymentDetail->sales_invoice_no = $payload->sales_invoice_no;
        $paymentDetail->amount = $payload->amount;
        $paymentDetail->save();

        return $paymentDetail->fresh();
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
