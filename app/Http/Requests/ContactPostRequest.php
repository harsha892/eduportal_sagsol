<?php

namespace App\Http\Requests;

use Dingo\Api\Http\FormRequest;

class ContactPostRequest extends FormRequest
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
            "user_id" =>  "required|unique:contacts",

            "country_code" =>  "required",
            "personal_phone" => "required|unique:contacts",
            "emergency_phone" => "required",

            "city" => "required",
            "state" => "required",
            "zipcode" => "required",
            "full_address" => "required",

        ];
    }
}
