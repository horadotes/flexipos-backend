<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'role_id' => 'required',
            'stripe_user_id' => 'nullable',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'role' => 'required',
            'password' => 'required',
        ];
    }
}
