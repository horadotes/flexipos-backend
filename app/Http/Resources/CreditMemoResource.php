<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreditMemoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'prepared_by_id' => $this->prepared_by_id,
            'cancelled_by_id' => $this->cancelled_by_id,
            'customer_id' => $this->customer_id,
            'sales_representative_id' => $this->sales_representative_id,
            'credit_type' => $this->credit_type,
            'invoice_no' => $this->invoice_no,
            'sales_invoice_document_no' => $this->sales_invoice_document_no,
            'date' => $this->date,
            'amount' => $this->amount,
            'remarks' => $this->remarks,
            'is_cancelled' => $this->is_cancelled,
            'created_at' => $this->created_at,
        ];
    }
}
