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
            'discount' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:3000',
            'gallery' => 'required'
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
