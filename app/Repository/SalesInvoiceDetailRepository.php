<?php

namespace App\Repository;

use App\Interface\Repository\SalesInvoiceDetailRepositoryInterface;
use App\Models\SalesInvoiceDetail;
use Illuminate\Database\Eloquent\Collection;

class SalesInvoiceDetailRepository implements SalesInvoiceDetailRepositoryInterface
{
    public function findMany(): Collection
    {
        return SalesInvoiceDetail::all();
    }

    public function findOneById(int $id): SalesInvoiceDetail
    {
        return SalesInvoiceDetail::findOrFail($id);
    }

    public function create(object $payload): SalesInvoiceDetail
    {
        $salesInvoiceDetail = new SalesInvoiceDetail();
        $salesInvoiceDetail->sales_invoice_id = $payload->sales_invoice_id;
        $salesInvoiceDetail->sales_invoice_ref_doc_no = $payload->sales_invoice_ref_doc_no;
        $salesInvoiceDetail->product_id = $payload->product_id;
        $salesInvoiceDetail->barcode = $payload->barcode;
        $salesInvoiceDetail->unit = $payload->unit;
        $salesInvoiceDetail->expiry_date = $payload->expiry_date;
        $salesInvoiceDetail->quantity = $payload->quantity;
        $salesInvoiceDetail->price = $payload->price;
        $salesInvoiceDetail->save();

        return $salesInvoiceDetail->fresh();
    }

    public function update(object $payload, int $id): SalesInvoiceDetail
    {
        $salesInvoiceDetail = SalesInvoiceDetail::findOrFail($id);
        $salesInvoiceDetail->sales_invoice_id = $payload->sales_invoice_id;
        $salesInvoiceDetail->sales_invoice_ref_doc_no = $payload->sales_invoice_ref_doc_no;
        $salesInvoiceDetail->product_id = $payload->product_id;
        $salesInvoiceDetail->barcode = $payload->barcode;
        $salesInvoiceDetail->unit = $payload->unit;
        $salesInvoiceDetail->expiry_date = $payload->expiry_date;
        $salesInvoiceDetail->quantity = $payload->quantity;
        $salesInvoiceDetail->price = $payload->price;
        $salesInvoiceDetail->save();

        return $salesInvoiceDetail->fresh();
    }

    public function delete(int $id): bool
    {
        $salesInvoiceDetail = SalesInvoiceDetail::findOrFail($id);
        $salesInvoiceDetail->delete();

        return true;
    }
}
