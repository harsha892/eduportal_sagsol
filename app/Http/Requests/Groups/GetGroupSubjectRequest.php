<?php

namespace App\Http\Requests\Groups;

use Cartalyst\Sentinel\Sentinel;
use Dingo\Api\Http\FormRequest;

class GetGroupSubjectRequest extends FormRequest
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
            'group_id' => 'required|numeric|exists:groups,id',
            'subject_id' => 'required|numeric|exists:group_subjects,id',
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
        $data['subject_id'] = $this->route('subject_id');
        return $data;
    }
}
