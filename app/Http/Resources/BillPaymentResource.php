<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillPaymentResource extends JsonResource
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
            'approved_by_id' => $this->approved_by_id,
            'cancelled_by_id' => $this->cancelled_by_id,
            'payment_date' => $this->payment_date,
            'payment_type' => $this->payment_type,
            'cash_voucher_no' => $this->cash_voucher_no,
            'is_cancelled' => $this->is_cancelled,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
