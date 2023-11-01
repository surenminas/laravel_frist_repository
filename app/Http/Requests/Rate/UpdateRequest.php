<?php

namespace App\Http\Requests\Rate;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'symbole' => 'required|min:3|max:3',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Enter Name',
            'name.string' => 'Must be string',
            'symbole.required' => 'Enter Name',
            'symbole.string' => 'Must be string',
            'symbole.min' => 'Must be uppercase and 3 symbole min',
            'symbole.max' => 'Must be uppercase and 3 symbole max',
        ];
    }
}
