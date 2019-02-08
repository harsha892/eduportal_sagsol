<?php

namespace App\Http\Requests;

use Dingo\Api\Http\FormRequest;

class UserUpdateRoleRequest extends FormRequest
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
            "user_id" =>  "required|exists:users,id|exists:role_users,user_id",
            "role_id" =>  "required|exists:roles,id",
        ];
    }
}
