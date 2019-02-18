<?php

namespace App\Http\Requests\Groups;

use Cartalyst\Sentinel\Sentinel;
use Dingo\Api\Http\FormRequest;

class GroupCheckRequest extends FormRequest
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
            'group' => 'required|numeric|exists:groups,id',
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
        $data['group'] = $this->route('group');
        return $data;
    }
}
