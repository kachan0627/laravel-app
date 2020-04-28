<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTweetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     //認証関係の判定を行う場合はauthorizeに処理を追加する
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     //バリデーションルールを記述
    public function rules()
    {
        return [
            'user_id' =>'required',//'required|digits',
            'text'    =>'required|string|max:255',
        ];
    }
    //エラーメッセージ
    public function messages()
    {
      return [
        'user_id.required' => 'ログインし直してください',
        'text.required'    => '入力してください',
        'text.max'         => 'テキストは255文字以内で入力してください',
      ];
    }
}
