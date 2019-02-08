<?php

namespace App\Http\Requests;

use Dingo\Api\Http\FormRequest;

class updateGroupRequest extends FormRequest
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
            "id" =>  "required|exists:groups,id",
            "name" =>  "required|unique:groups",
            "is_active" =>  "required|boolean",
            "created_by" =>  "required|exists:users,id",
            "updated_by" =>  "required|exists:users,id",
            "short_description" =>  "required",
            "related_subject_ids"=> "array"
        ];
    }
}
