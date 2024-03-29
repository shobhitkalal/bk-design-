<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id'=>['required','integer'],
            'name'=>['required','string'],
            'original_price'=>['required','string'],
            "selling_price"=>['required','string'],
            "qty"=>['required','integer'],
        ];

    }
}
