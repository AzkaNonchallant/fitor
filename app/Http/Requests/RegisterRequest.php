<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'string|required|min:8|confirmed'
        ];
    }

    #[Override]
    public function messages()
    {
        return [
        'name.required' => 'Nama Wajib Di Isi',
        'email.required' => 'Email Wajib Di Isi',
        'email.email' => 'Email Tidak Valid',
        'password.required' => 'Password Wajib Di Isi',
        'password.min' => 'Password Wajib 8 Karakter'
        ];
    }
}
