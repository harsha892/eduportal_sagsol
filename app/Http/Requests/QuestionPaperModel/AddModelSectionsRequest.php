<?php

namespace App\Http\Requests\QuestionPaperModel;

use Dingo\Api\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddModelSectionsRequest extends FormRequest
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
            'model_id' => 'required|numeric|exists:question_paper_models,id',
            'sections' => 'required|array',
            'sections.*.questions' => 'required|numeric',
            'sections.*.options' => 'required|numeric',
            'sections.*.marks' => 'required|numeric',
            'sections.*.question_type' => 'required|numeric|exists:question_type,id',
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
        $data['model_id'] = $this->route('model_id');
        return $data;
    }
}
