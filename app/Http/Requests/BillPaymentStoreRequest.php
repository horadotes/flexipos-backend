<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillPaymentStoreRequest extends FormRequest
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
            'approved_by_id',
            'cancelled_by_id',
            'payment_date' => 'required',
            'payment_type' => 'required',
            'cash_voucher_no' => 'required',
            'is_cancelled',
        ];
    }
}
