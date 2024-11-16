<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentChequeResource extends JsonResource
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
            'bank' => $this->bank,
            'cheque_number' => $this->cheque_number,
            'cheque_date' => $this->cheque_date,
            'cheque_voucher_number' => $this->cheque_voucher_number,
            'amount' => $this->amount,
            'created_at' => $this->created_at,
        ];
    }
}
