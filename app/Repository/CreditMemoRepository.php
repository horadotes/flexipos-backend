<?php

namespace App\Repository;

use App\Interface\Repository\CreditMemoRepositoryInterface;
use App\Models\CreditMemo;

class CreditMemoRepository implements CreditMemoRepositoryInterface
{
    public function findMany()
    {
        return CreditMemo::all();
    }

    public function findOneById(int $id)
    {
        return CreditMemo::findOrFail($id);
    }

    public function create(object $payload)
    {
        $creditMemo = new CreditMemo();
        $creditMemo->prepared_by_id = $payload->prepared_by_id;
        $creditMemo->cancelled_by_id = $payload->cancelled_by_id;
        $creditMemo->customer_id = $payload->customer_id;
        $creditMemo->sales_representative_id = $payload->sales_representative_id;
        $creditMemo->credit_type = $payload->credit_type;
        $creditMemo->invoice_no = $payload->invoice_no;
        $creditMemo->sales_invoice_document_no = $payload->sales_invoice_document_no;
        $creditMemo->date = $payload->date;
        $creditMemo->amount = $payload->amount;
        $creditMemo->remarks = $payload->remarks;
        $creditMemo->is_cancelled = $payload->is_cancelled;
        $creditMemo->save();

        return $creditMemo->fresh();
    }

    public function update(object $payload, int $id)
    {
        $creditMemo = CreditMemo::findOrFail($id);
        $creditMemo->prepared_by_id = $payload->prepared_by_id;
        $creditMemo->cancelled_by_id = $payload->cancelled_by_id;
        $creditMemo->customer_id = $payload->customer_id;
        $creditMemo->sales_representative_id = $payload->sales_representative_id;
        $creditMemo->credit_type = $payload->credit_type;
        $creditMemo->invoice_no = $payload->invoice_no;
        $creditMemo->sales_invoice_document_no = $payload->sales_invoice_document_no;
        $creditMemo->date = $payload->date;
        $creditMemo->amount = $payload->amount;
        $creditMemo->remarks = $payload->remarks;
        $creditMemo->is_cancelled = $payload->is_cancelled;
        $creditMemo->save();

        return $creditMemo->fresh();
    }

    public function delete(int $id)
    {
        $creditMemo = CreditMemo::findOrFail($id);
        $creditMemo->delete();

        return true;
    }
}
