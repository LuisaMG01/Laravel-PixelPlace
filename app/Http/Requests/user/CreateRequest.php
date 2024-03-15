<?php

namespace App\Http\Requests\user;

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
            'email' => 'required',
            'balance' => 'required|numeric|min:0',
            'role' => 'required'
        ];
    }
}
