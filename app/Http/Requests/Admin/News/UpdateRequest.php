<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'content' => ['required', 'string', 'min:3'],
            'annotation' => ['required', 'string', 'min:3'],
            'status' => ['required', 'in:active,draft,off'],
            'authors' => ['required', 'array', 'exists:authors,id'],
            'categories' => ['required', 'array', 'exists:categories,id'],
            'image_url' => ['nullable']
        ];
    }
}
