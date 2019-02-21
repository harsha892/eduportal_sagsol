<?php

namespace App\Http\Requests\Questions;

use Dingo\Api\Http\FormRequest;

class AddQuestionAnswerRequest extends FormRequest
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
            'answer' => 'required|array',
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
        return $data;
    }
}
