<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentDetailResource extends JsonResource
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
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'payment_id' => $this->payment_id,
            'payment_method_id' => $this->payment_method_id,
            'bank_id' => $this->bank_id,
            'cheque_number' => $this->cheque_number,
            'cheque_date' => $this->cheque_date,
            'amount' => $this->amount,
            'sales_invoice_no' => $this->sales_invoice_no,
            'created_at' => $this->created_at,
        ];
    }
}
