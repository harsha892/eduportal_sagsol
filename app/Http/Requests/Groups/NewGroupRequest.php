<?php

namespace App\Http\Requests\Groups;

use Cartalyst\Sentinel\Sentinel;
use Dingo\Api\Http\FormRequest;

class NewGroupRequest extends FormRequest
{

    private $auth;

    public function __construct(
        Sentinel $auth
    ) {
        $this->auth = $auth;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->auth->getUser();
        return $user && $user->canCreateGroup();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "slug" => "required|unique:groups",
            "name" => "required",
            "durations" => "required|numeric|min:1",
            "semesters" => "required|numeric|min:1",
        ];
    }
}
