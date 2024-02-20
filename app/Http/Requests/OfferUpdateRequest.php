<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferUpdateRequest extends FormRequest
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
            'user_id' => ['sometimes', 'exists:users,id'],
            'category_id' => ['sometimes', 'exists:categories,id'],
            'title' => ['sometimes', 'string', 'max:255'],
            'picture' =>['nullable', 'image', 'max:4096'],
            'description' => ['sometimes', 'string'],
            'location' => ['sometimes', 'string'],
            'salary' => ['sometimes', 'string'],
            'contract_type' => ['sometimes', 'string'],
            'experience' => ['sometimes', 'string'], 
        ];
    }
}
