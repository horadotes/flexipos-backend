<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditMemoUpdateRequest extends FormRequest
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
            'customer_id' => 'required',
            'sales_representative_id' => 'required',
            'credit_type' => 'required',
            'invoice_no' => 'required',
            'sales_invoice_document_no',
            'date' => 'required',
            'amount' => 'required',
            'remarks',
            'is_cancelled' => 'required',
        ];
    }
}
