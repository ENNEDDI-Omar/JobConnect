<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required','string','email',Rule::unique('users', 'email')->ignore($this->user)],
            'password' => ['nullable', 'min:6', 'confirmed', Password::defaults()],
            'description' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:14'],
        ];
    }
}
