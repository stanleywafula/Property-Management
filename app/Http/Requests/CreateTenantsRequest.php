<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTenantsRequest extends FormRequest
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
            'property_id' => 'required',
            'apartment_number' => 'required',
            'full_name' => 'required',
            'mobile_phone' => 'required',
            'email' => 'required',
            'start_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'property_id.required' => 'The property field is required.',

        ];

    }
}
