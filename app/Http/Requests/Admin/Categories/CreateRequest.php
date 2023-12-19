<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:150'],
            'slug' => ['required', 'string', 'min:3', 'max:150'],
            'image' => ['nullable', 'image'],
            'description' => ['required', 'string', 'min:5', 'max:150'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Наименование',
            'slug' => 'Слаг',
            'description' => 'Описание'
        ];
    }
}
