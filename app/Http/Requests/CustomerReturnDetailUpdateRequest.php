<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerReturnDetailUpdateRequest extends FormRequest
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
            'customer_return_id' => 'required',
            'customer_return_number' => 'required',
            'product_id' => 'required',
            'unit' => 'required',
            'expiry_date' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ];
    }
}
