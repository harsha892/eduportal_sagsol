<?php

namespace App\Http\Requests\Groups;

use Cartalyst\Sentinel\Sentinel;
use Dingo\Api\Http\FormRequest;

class AddTopicsToSubjectRequest extends FormRequest
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
            'subject_id' => 'required|numeric|exists:group_subjects,id',
            'topics' => 'required|array',
            'topics.*.name' => 'required',
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
        $data['subject_id'] = $this->route('subject_id');
        return $data;
    }
}
