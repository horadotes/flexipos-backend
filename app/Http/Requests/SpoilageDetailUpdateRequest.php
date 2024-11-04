<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpoilageDetailUpdateRequest extends FormRequest
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
            'spoilage_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'financial_impact' => 'required',
        ];
    }
}
