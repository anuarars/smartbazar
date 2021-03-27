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
            'country_id' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'measure_id' => 'required',
            'title' => 'required|min:3|max:20',
            'description' => 'required|min:10|max:500',
            'price' => 'required|integer',
            'count' => 'required|integer',
            'discount' => 'integer',
            'gallery' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'country_id.required' => 'Не указана Страна производитель',
            'brand_id.required' => 'Не указан производитель',
            'measure_id.required' => 'Не указана единица измерения товара',
            'category_id.required' => 'Не указана категория',
            'title.required' => 'Наименование товара не указана',
            'description.required' => 'Описание товара не должно быть пустым',
            'price.required' => 'Цена товара не указана',
            'count.required' => 'Количество товара не должно быть пустым',
            'discount.integer' => 'Скидка должна быть указана в цифрах',
            'gallery.required' => 'Добавьте изображения для товара',
        ];
    }
}
