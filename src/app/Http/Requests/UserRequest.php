<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'string|max:50',
            'email' => 'required|email:strict,dns|max:255|unique:users,email,' . $this->id . ',id',
            'age' => 'integer',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'age' => '年齢',
        ];
    }

    public function message()
    {
        return [
            'name.max' => ':attributeは50文字以内で入力してください',
            'email.required' => ':attributeの入力をお願いします',
            'email.email' => ':attributeがメールアドレスの形式で入力してください',
            'email.max' => ':attributeは255文字以内で入力してください',
            'email.unique' => 'この:attributeは登録できません',
            'age.integer' => ':attributeは数値で入力してください',
        ];
    }
}
