<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillpaymentChequeResource extends JsonResource
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
            'bills_payment_id' => $this->bills_payment_id,
            'bank_id' => $this->bank_id,
            'cheque_number' => $this->cheque_number,
            'cheque_date' => $this->cheque_date,
            'check_voucher_no' => $this->check_voucher_no,
            'amount' => $this->amount,
            'created_at' => $this->created_at,
        ];
    }
}
