<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'product_category_id' => 'required',
            'barcode',
            'name' => 'required',
            'brand' => 'required',
            'quantity_onhand' => 'required',
            'wholesale_unit' => 'required',
            'retail_unit' => 'required',
            'wholesale_quantity' => 'required',
            'current_price',
            'expiry_date',
            'reorder_point' => 'required',
            'markup' => 'required',
            'is_active' => 'required',
        ];
    }
}
