<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;

class StoreUserRequest extends FormRequest
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
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class,
            'password' => 'required', 'confirmed',
        ];
    }
}
