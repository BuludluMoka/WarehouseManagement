<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductUpdateRequest extends FormRequest
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
            "name" => "max:40",
            "buyPrice" => "integer",
            "sellPrice" => "integer",
            "category_id" => "integer"
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
            'name.max:40' => 'Mehsul adini min 1 max 40 herf girin',
            'buyPrice.integer' => 'Number girin',
            'sell.integer' => 'Number girin',
            'category_id.integer' => 'Number girin',
        ];
    }
}
