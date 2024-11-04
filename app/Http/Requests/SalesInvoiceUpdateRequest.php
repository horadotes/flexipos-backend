<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesInvoiceUpdateRequest extends FormRequest
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
            'branch_id',
            'sales_order_id',
            'customer_id' => 'required',
            'prepared_by_id' => 'required',
            'sales_representative' => 'required',
            'cancelled_by_id',
            'approved_by_id',
            'invoice_no',
            'document_no',
            'date',
            'due_date',
            'terms',
            'is_cancelled',
            'is_approved',
            'remarks',
        ];
    }
}
