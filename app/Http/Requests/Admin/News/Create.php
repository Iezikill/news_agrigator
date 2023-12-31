<?php

namespace App\Http\Requests\Admin\News;

use App\Enums\News\Status;
use App\Models\EloquentModels\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class Create extends FormRequest
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
        $tableNameCategory = (new Category())->getTable();
        return [
            'title' => ['required', 'string', 'min:3', 'max:150'],
            'category_id' => ['required', 'int', "exists:{$tableNameCategory},id"],
            'author' => ['required', 'string', 'min:2', 'max:100'],
            'image' => ['nullable', 'image'],
            'status' => ['required', new Enum(Status::class)],
            'description' => ['nullable', 'string'],
            'text' => ['required', 'string', 'min:10', 'max:100'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Заголовок',
            'author' => 'Автор',
            'text' => 'Текст'
        ];
    }
}
