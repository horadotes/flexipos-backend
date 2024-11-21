<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierReturnUpdateRequest extends FormRequest
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
            'supplier_return_number',
            'bill_id' => 'required',
            'prepared_by_id' => 'required',
            'approved_by_id',
            'cancelled_by_id',
            'branch_no',
            'return_date' => 'required',
            'remarks',
            'is_cancelled',
        ];
    }
}
