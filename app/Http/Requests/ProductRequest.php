<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'price' => 'required|integer',
            'count' => 'required|integer',
            'discount' => 'integer',
        ];
    }

    public function messages()
    {
        return [
            'price.required' => 'Цена товара не указана',
            'count.required' => 'Количество товара не должно быть пустым',
            'discount.integer' => 'Скидка должна быть указана в цифрах',
        ];
    }
}
