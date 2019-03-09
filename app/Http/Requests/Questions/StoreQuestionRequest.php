<?php

namespace App\Http\Requests\Questions;

use Cartalyst\Sentinel\Sentinel;
use Dingo\Api\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuestionRequest extends FormRequest
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
            'difficulty_id' => 'required|numeric|exists:difficulty,id',
            'privacy_id' => 'required|numeric|exists:privacy,id',
            'topic_id' => 'required|numeric|exists:topics,id',
            'type' => [
                'required',
                Rule::in(['objective', 'descriptive', 'orative', 'mcq']),
            ],
            'title' => 'required',
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
        return $data;
    }
}
