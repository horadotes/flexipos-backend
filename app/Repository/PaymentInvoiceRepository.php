<?php

namespace App\Repository;

use App\Interface\Repository\PaymentInvoiceRepositoryInterface;
use App\Models\PaymentInvoice;

class PaymentInvoiceRepository implements PaymentInvoiceRepositoryInterface
{
    public function findMany()
    {
        return PaymentInvoice::all();
    }

    public function findOneById(int $id)
    {
        return PaymentInvoice::findOrFail($id);
    }

    public function create(object $payload)
    {
        $paymentInvoice = new PaymentInvoice();
        $paymentInvoice->payment_id = $payload->payment_id;
        $paymentInvoice->sales_invoice_id = $payload->sales_invoice_id;
        $paymentInvoice->amount = $payload->amount;
        $paymentInvoice->date = $payload->date;
        $paymentInvoice->save();

        return $paymentInvoice->fresh();
    }

    public function update(object $payload, int $id)
    {
        $paymentInvoice = PaymentInvoice::findOrFail($id);
        $paymentInvoice->payment_id = $payload->payment_id;
        $paymentInvoice->sales_invoice_id = $payload->sales_invoice_id;
        $paymentInvoice->amount = $payload->amount;
        $paymentInvoice->date = $payload->date;
        $paymentInvoice->save();

        return $paymentInvoice->fresh();
    }

    public function delete(int $id)
    {
        $paymentInvoice = PaymentInvoice::findOrFail($id);

        $paymentInvoice->delete();

        return true;
    }
}
