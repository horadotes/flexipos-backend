<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerReturnResource extends JsonResource
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
            'return_date' => $this->return_date,
            'return_status' => $this->return_status,
            'created_at' => $this->created_at,
        ];
    }
}
