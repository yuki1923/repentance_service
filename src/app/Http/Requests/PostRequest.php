<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|string|max:50',
            'text' => 'required|string|max:400',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'text' => '懺悔',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => ':attributeを入力してください',
            'title.max' => ':attributeは50文字以内で入力してください',
            'title.string' => ':attributeは文字列で入力してください',
            'text.required' => ':attributeを入力してください',
            'text.string' => ':attributeは文字列で入力してください',
            'text.max' => ':attributeは50文字以内で入力してください',
        ];
    }
}
