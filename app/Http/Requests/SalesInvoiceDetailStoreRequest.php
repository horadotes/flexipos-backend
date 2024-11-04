<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesInvoiceDetailStoreRequest extends FormRequest
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
            'sales_invoice_ref_doc_no' => 'required',
            'product_id' => 'required',
            'barcode',
            'unit',
            'expiry_date',
            'quantity',
            'price',
        ];
    }
}
