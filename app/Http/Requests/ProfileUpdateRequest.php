<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'current_password' => ['nullable', 'string'],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'This email is already taken.',
            'current_password.required_with' => 'Please enter your current password to change it.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    }
}
