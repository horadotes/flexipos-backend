<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupplierReturnResource extends JsonResource
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
            'bill_id' => $this->bill_id,
            'prepared_by_id' => $this->prepared_by_id,
            'approved_by_id' => $this->approved_by_id,
            'cancelled_by_id' => $this->cancelled_by_id,
            'branch_no' => $this->branch_no,
            'return_date' => $this->return_date,
            'remarks' => $this->remarks,
            'is_cancelled' => $this->is_cancelled,
            'created_at' => $this->created_at,
        ];
    }
}
