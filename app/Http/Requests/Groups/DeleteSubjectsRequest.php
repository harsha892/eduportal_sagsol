<?php

namespace App\Http\Requests\Groups;

use Cartalyst\Sentinel\Sentinel;
use Dingo\Api\Http\FormRequest;

class DeleteSubjectsRequest extends FormRequest
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
            'group_id' => 'required|numeric|exists:groups,id',
            'subjects' => 'required|array',
            'subjects.*' => 'required|numeric|exists:group_subjects,id',
        ];
    }

    /**
     * Add parameters to be validated
     *
     * @return array
     */
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['group_id'] = $this->route('group_id');
        return $data;
    }
}
