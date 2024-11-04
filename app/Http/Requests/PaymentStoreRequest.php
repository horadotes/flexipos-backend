<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentStoreRequest extends FormRequest
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
            'branch_no',
            'or_number',
            'customer_id' => 'required',
            'is_approved',
            'is_cancelled',
            'payment_date' => 'required',
            'prepared_by_id' => 'required',
            'cancelled_by_id',
            'approvedby',
            'remarks',
        ];
    }
}
