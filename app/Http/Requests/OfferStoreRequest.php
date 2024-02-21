<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferStoreRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'picture' => ['required', 'image', 'max:4096'],
            'location' => ['required', 'string'],
            'salary' => ['required', 'string', 'min:0'],
            'contract_type' => ['required', 'string'],
            'experience' => ['required', 'string'],
        ];
    }
}