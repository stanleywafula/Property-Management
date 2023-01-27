<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePropertiesRequest extends FormRequest
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
            //
            'property_type' => 'required',
            'property_name' => 'required',

        ];
    }


    public function messages()
    {
        return [
            'property_type.required' => 'The property type field is required.',
            'property_name.required' => 'The property name field is required.',
        ];

    }
}
