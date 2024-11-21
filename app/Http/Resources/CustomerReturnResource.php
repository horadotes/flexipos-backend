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
            'sales_invoice_id' => $this->sales_invoice_id,
            'prepared_by_id' => $this->prepared_by_id,
            'approved_by_id' => $this->approved_by_id,
            'cancelled_by_id' => $this->cancelled_by_id,
            'branch_number' => $this->branch_number,
            'customer_return_number' => $this->customer_return_number,
            'return_date' => $this->return_date,
            'remarks' => $this->remarks,
            'is_cancelled' => $this->is_cancelled,
            'created_at' => $this->created_at,
        ];
    }
}
