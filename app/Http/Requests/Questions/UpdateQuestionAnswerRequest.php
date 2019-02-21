<?php

namespace App\Http\Requests\Topics;

use Dingo\Api\Http\FormRequest;

class UpdateQuestionAnswerRequest extends FormRequest
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
            'question_id' => 'required|numeric|exists:questions,id',
            'answer_id' => 'required|numeric|exists:question_answers,id',
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
        $data['question_id'] = $this->route('question_id');
        $data['answer_id'] = $this->route('answer_id');
        return $data;
    }
}
