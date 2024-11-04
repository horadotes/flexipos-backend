<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
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
            'supplier_id' => $this->supplier_id,
            'prepared_by_id' => $this->prepared_by_id,
            'cancelled_by_id' => $this->cancelled_by_id,
            'purchase_order_no' => $this->purchase_order_no,
            'bill_date' => $this->bill_date,
            'payment_terms' => $this->payment_terms,
            'amount' => $this->amount,
            'is_cancelled' => $this->is_cancelled,
            'created_at' => $this->created_at,
        ];
    }
}
