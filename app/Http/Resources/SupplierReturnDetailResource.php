<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupplierReturnDetailResource extends JsonResource
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
            'supplier_return_id' => $this->supplier_return_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'financial_impact' => $this->financial_impact,
            'created_at' => $this->created_at,
        ];
    }
}
