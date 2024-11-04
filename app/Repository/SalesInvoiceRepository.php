<?php

namespace App\Repository;

use App\Interface\Repository\SalesInvoiceRepositoryInterface;
use App\Models\SalesInvoice;

class SalesInvoiceRepository implements SalesInvoiceRepositoryInterface
{
    public function findMany()
    {
        return SalesInvoice::all();
    }

    public function findOneById(int $id): SalesInvoice
    {
        return SalesInvoice::findOrFail($id);
    }

    public function create(object $payload): SalesInvoice
    {
        $salesInvoice = new SalesInvoice();
        $salesInvoice->branch_id = $payload->branch_id;
        $salesInvoice->sales_order_id = $payload->sales_order_id;
        $salesInvoice->customer_id = $payload->customer_id;
        $salesInvoice->prepared_by_id = $payload->prepared_by_id;
        $salesInvoice->sales_representative = $payload->sales_representative;
        $salesInvoice->cancelled_by_id = $payload->cancelled_by_id;
        $salesInvoice->approved_by_id = $payload->approved_by_id;
        $salesInvoice->invoice_no = $payload->invoice_no;
        $salesInvoice->document_no = $payload->document_no;
        $salesInvoice->date = $payload->date;
        $salesInvoice->due_date = $payload->due_date;
        $salesInvoice->terms = $payload->terms;
        $salesInvoice->amount = $payload->amount;
        $salesInvoice->is_cancelled = $payload->is_cancelled;
        $salesInvoice->is_approved = $payload->is_approved;
        $salesInvoice->remarks = $payload->remarks;
        $salesInvoice->save();

        return $salesInvoice->fresh();
    }

    public function update(object $payload, int $id)
    {
        $salesInvoice = SalesInvoice::findOrFail($id);
        $salesInvoice->branch_id = $payload->branch_id;
        $salesInvoice->sales_order_id = $payload->sales_order_id;
        $salesInvoice->customer_id = $payload->customer_id;
        $salesInvoice->prepared_by_id = $payload->prepared_by_id;
        $salesInvoice->sales_representative = $payload->sales_representative;
        $salesInvoice->cancelled_by_id = $payload->cancelled_by_id;
        $salesInvoice->approved_by_id = $payload->approved_by_id;
        $salesInvoice->invoice_no = $payload->invoice_no;
        $salesInvoice->document_no = $payload->document_no;
        $salesInvoice->date = $payload->date;
        $salesInvoice->due_date = $payload->due_date;
        $salesInvoice->terms = $payload->terms;
        $salesInvoice->amount = $payload->amount;
        $salesInvoice->is_cancelled = $payload->is_cancelled;
        $salesInvoice->is_approved = $payload->is_approved;
        $salesInvoice->remarks = $payload->remarks;
        $salesInvoice->save();

        return $salesInvoice->fresh();
    }

    public function delete(int $id): bool
    {
        $salesInvoice = SalesInvoice::findOrFail($id);
        $salesInvoice->delete();

        return true;
    }
}
