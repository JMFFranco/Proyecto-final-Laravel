<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Puedes personalizar esto si tienes políticas
    }

    public function rules(): array
    {
        return [
            'category_name' => 'required|string|max:255',
            'category_description' => 'required|string',
            'category_priority' => 'required|integer|min:1',
        ];
    }
}
