<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SalesOrderResource extends JsonResource
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
            'processed_by_id' => $this->processed_by_id,
            'customer_id' => $this->customer_id,
            'date' => $this->date,
            'total_amount' => $this->total_amount,
            'discount' => $this->discount,
            'tax_amount' => $this->tax_amount,
            'created_at' => $this->created_at,
        ];
    }
}
