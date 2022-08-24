<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment' => 'required|string|max:400',
        ];
    }

    public function attributes()
    {
        return [
            'comment' => 'コメント',
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => ':attributeが入力されていません。',
            'comment.string' => ':attributeは文字列で入力してください。',
            'comment.max' => ':attributeは400文字以内で入力してください。',
        ];
    }
}
