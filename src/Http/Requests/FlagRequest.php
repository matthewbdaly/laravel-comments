<?php

namespace Matthewbdaly\LaravelComments\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Flag request
 */
class FlagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
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
            'user_id'    => 'string',
            'comment_id' => 'required|string',
            'reason'     => 'required|string',
        ];
    }
}
