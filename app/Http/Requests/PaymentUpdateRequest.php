<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentUpdateRequest extends FormRequest
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
            'prepared_by_id' => 'required',
            'cancelled_by_id',
            'approved_by_id',
            'branch_no',
            'or_number',
            'customer_id' => 'required',
            'is_approved',
            'is_cancelled',
            'payment_date' => 'required',
            'remarks',
        ];
    }
}
