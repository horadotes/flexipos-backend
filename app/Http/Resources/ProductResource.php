<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'product_category_id' => $this->product_category_id,
            'barcode' => $this->barcode,
            'name' => $this->name,
            'brand' => $this->brand,
            'quantity_onhand' => $this->quantity_onhand,
            'wholesale_unit' => $this->wholesale_unit,
            'retail_unit' => $this->retail_unit,
            'wholesale_quantity' => $this->wholesale_quantity,
            'reorder_point' => $this->reorder_point,
            'current_price' => $this->current_price,
            'expiry_date' => $this->expiry_date,
            'markup' => $this->markup,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
        ];
    }
}
