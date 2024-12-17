<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            // 'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            // 'name' => 'nullable', 'string', 'max:255',
            // 'email' => 'nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class,
            // 'password' => 'nullable', 'confirmed',
        ];
    }
}