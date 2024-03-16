<?php

namespace App\Http\Requests\Review;

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
            'description' => 'required',
            'rating' => ['required', 'gt:0', 'lt:6'],
            'product_id' => 'required',
        ];
    }
}
