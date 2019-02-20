<?php

namespace App\Http\Requests\Topics;

use Dingo\Api\Http\FormRequest;

class UpdateTopicContentRequest extends FormRequest
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
            'topic_id' => 'required|numeric|exists:topics,id',
            'content_id' => 'required|numeric|exists:topic_contents,id',
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
        $data['topic_id'] = $this->route('topic_id');
        $data['content_id'] = $this->route('content_id');
        return $data;
    }
}
