<?php

namespace App\Http\Requests\QuestionPaperModel;

use Cartalyst\Sentinel\Sentinel;
use Dingo\Api\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuestionPaperModelRequest extends FormRequest
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
            'subject_id' => 'numeric|exists:group_subjects,id',
            'group_id' => 'numeric|exists:groups,id',
            // 'section_type' => [
            //     'required',
            //     Rule::in(['letter', 'number', 'roman']),
            // ],
            // 'name_type' => [
            //     'required',
            //     Rule::in(['letter', 'number', 'roman']),
            // ],
            'name' => 'required',
            'marks' => 'required|numeric',
            'time' => 'required|numeric',
            'no_of_sections' => 'required|numeric',
            'no_of_sections' => 'required|numeric',
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
