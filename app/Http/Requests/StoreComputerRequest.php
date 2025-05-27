<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComputerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'computer_brand' => 'required|string|max:255',
            'computer_model' => 'required|string|max:255',
            'computer_price' => 'required|numeric|min:0',
            'computer_ram_size' => 'required|integer',
            'computer_is_laptop' => 'required|boolean',
            'fk_category_computer' => 'required|exists:categories,category_id',
            'status' => 'required|boolean',
        ];
    }
}
