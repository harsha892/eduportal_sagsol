<?php

namespace App\Http\Requests;

use Dingo\Api\Http\FormRequest;

class SemisterRequest extends FormRequest
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
            "name" => "required|unique:semisters",
            "is_active" => "required|boolean",
            "created_by" => "required|exists:users,id",
            "updated_by" => "required|exists:users,id",
            "start_date" => "required",
            "end_date" => "required"
        ];
    }
}
