<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryAdjustmentDetailResource extends JsonResource
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
            'inventory_adjustment_id' => $this->inventory_adjustment_id,
            'product_id' => $this->product_id,
            'unit' => $this->unit,
            'expiry_date' => $this->expiry_date,
            'quantity' => $this->quantity,
            'remarks' => $this->remarks,
            'created_at' => $this->created_at,
        ];
    }
}
