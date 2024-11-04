<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'or_number' => $this->or_number,
            'customer_id' => $this->customer_id,
            'is_approved' => $this->is_approved,
            'is_cancelled' => $this->is_cancelled,
            'payment_date' => $this->payment_date,
            'prepared_by_id' => $this->prepared_by_id,
            'cancelled_by_id' => $this->cancelled_by_id,
            'approvedby' => $this->approvedby,
            'remarks' => $this->remarks,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
