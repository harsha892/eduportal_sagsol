<?php

namespace App\Http\Requests\Users;

use Dingo\Api\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        return $rules;
    }

}
