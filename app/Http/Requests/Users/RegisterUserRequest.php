<?php

namespace App\Http\Requests\Users;

use Dingo\Api\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            "email" => "required|unique:users",
            "password" => "required|min:8",
            "role_id" => "required",

            "user_detail.first_name" => "required",
            "user_detail.phone" => "required|min:10|max:10|unique:user_details,phone",
            "user_detail.emergency_phone" => "required|min:10|max:10",

            "user_detail.address" => "required",
            "user_detail.city" => "required",
            "user_detail.state" => "required",
            "user_detail.zip" => "required",
            "user_detail.country" => "required",

            "user_detail.dob" => "required|date_format:" . config('app.date_format'),

        ];
    }
}
