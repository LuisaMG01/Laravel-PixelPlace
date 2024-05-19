<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'image' => '',
            'brand' => 'required',
            'keywords' => 'required',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:0',
            'description' => 'required',
            'category_id' => 'required',
        ];
    }
}
