<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerReturnUpdateRequest extends FormRequest
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
            'sales_invoice_id' => 'required',
            'prepared_by_id' => 'required',
            'approved_by_id',
            'cancelled_by_id',
            'branch_number',
            'customer_return_number',
            'return_date' => 'required',
            'remarks' => 'required',
            'is_cancelled',
        ];
    }
}
