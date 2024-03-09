<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'image' => 'required',
            'brand' => 'required',
            'keywords' => 'required',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:0',
            'description' => 'required',
        ];
    }
}
