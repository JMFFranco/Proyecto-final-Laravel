<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_name' => 'sometimes|required|string|max:255',
            'category_description' => 'sometimes|required|string',
            'category_priority' => 'sometimes|required|integer|min:1',
        ];
    }
}
