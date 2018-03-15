<?php

namespace Matthewbdaly\LaravelComments\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Comment request
 */
class CommentRequest extends FormRequest
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
            'user_name'        => 'string',
            'user_email'       => 'string|email',
            'user_url'         => 'string|url',
            'comment'          => 'required|string',
            'commentable_id'   => 'required|string',
            'commentable_type' => 'required|string',
        ];
    }
}
