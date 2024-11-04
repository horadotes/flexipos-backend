<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'cashier_id' => $this->cashier_id,
            'customer_id' => $this->customer_id,
            'payment_method_id' => $this->payment_method_id,
            'total_amount' => $this->total_amount,
            'created_at' => $this->created_at,
        ];
    }
}
