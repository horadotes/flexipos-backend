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
            'payment_id' => $this->payment_id,
            'sales_invoice_id' => $this->sales_invoice_id,
            'sales_invoice_no' => $this->sales_invoice_no,
            'amount' => $this->amount,
            'created_at' => $this->created_at,
        ];
    }
}
