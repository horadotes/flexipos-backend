<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'supplier_id' => 'required',
            'prepared_by_id' => 'required',
            'cancelled_by_id',
            'purchase_order_no' => 'required',
            'bill_date' => 'required',
            'amount',
            'payment_terms' => 'required',
            'is_cancelled',
        ];
    }
}
