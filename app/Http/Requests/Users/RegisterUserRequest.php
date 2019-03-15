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
            "phone" => "required|unique:users",
            "password" => "required|min:8",
            "address" => "required",
            // "role_id" => "required",

            "user_detail.first_name" => "required",
            "user_detail.level_year" => "required",
            "user_detail.level_semester" => "required",
            "user_detail.father_name" => "required",

            "user_detail.phone" => "required|min:10|max:10|unique:user_details,phone",
            "user_detail.gender" => "required|in:male,female,transgender",
            "user_detail.email" => "required|unique:user_details,email",
            // "user_detail.emergency_phone" => "required|min:10|max:10",

            "user_detail.profile_image" => "required",
            "user_detail.blood_group" => "required",
            "user_detail.identity_number" => "required",

            "user_detail.address" => "required",
            "user_detail.city" => "required",
            "user_detail.state" => "required",
            "user_detail.zip" => "required",
            "user_detail.country" => "required",

            "user_detail.dob" => "required|date_format:" . config('app.date_format'),
            "user_detail.group" => "required|exists:groups,id",
            "user_detail.academic_year" => "required|exists:academic_years,id",

            "user_detail.hobbies" => "required",
            "user_detail.skills" => "required",
            "user_detail.languages" => "required",
            "user_detail.references" => "required",

            "qualifications" => "required|array",
            "qualifications.*.college" => "required",
            "qualifications.*.year" => "required",
            "qualifications.*.marks" => "required|numeric",
            "qualifications.*.percentage" => "required|numeric",
            "qualifications.*.attachment" => "required",

            "experiences" => "required|array",
            "experiences.*.company" => "required",
            "experiences.*.year" => "required",
            "experiences.*.title" => "required",

            "bank_account" => "required",
            "bank_account.bank" => "required",
            "bank_account.ifsc" => "required",
            "bank_account.ac_no" => "required",

        ];
    }
}
