<?php

namespace App\Http\Requests\User\Forms\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'full_name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'email', 'min:6', 'max:100'],
            'phone' => ['required', 'regex:/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', 'min:10', 'max:35'],
            'text' => ['required', 'string', 'min:5']
        ];
    }

    public function attributes(): array
    {
        return [
            'text' => 'Текст заказа'
        ];
    }
}
