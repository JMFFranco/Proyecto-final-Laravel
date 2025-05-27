<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComputerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'computer_brand' => 'sometimes|required|string|max:255',
            'computer_model' => 'sometimes|required|string|max:255',
            'computer_price' => 'sometimes|required|numeric|min:0',
            'computer_ram_size' => 'sometimes|integer',
            'computer_is_laptop' => 'sometimes|boolean',
            'fk_category_computer' => 'nullable|exists:categories,category_id',
            'status' => 'sometimes|boolean',
        ];
    }
}
