<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryAdjustmentResource extends JsonResource
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
            'branch_number' => $this->branch_number,
            'adjustment_date' => $this->adjustment_date,
            'remarks' => $this->remarks,
            'is_cancelled' => $this->is_cancelled,
            'created_at' => $this->created_at,
        ];
    }
}
