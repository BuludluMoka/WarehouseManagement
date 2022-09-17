<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|max:40",
            "buyPrice" => "integer",
            "sellPrice" => "integer",
            "category_id" => "required|integer"
        ];
    }
    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));
    }
    public function messages()
    {
        return [
            'name.required' => 'Mehsul adini 1 ve 40 herf arasi girin',
            'buyPrice.required' => 'Bir qiymet girin',
            'buyPrice.integer' => 'Number girin',

            'sellPrice.integer' => 'Number girin',
            'category_id.integer' => 'Number girin',
            'category_id.required' => 'Bir reqem girin'
        ];
    }
}
