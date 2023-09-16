<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'MyBook/insert') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'author' => 'required',
            'synopsis' => 'between:0,200',
            'impressions' => 'between:0,200',
            'image' => 'mimetypes:image/jpeg,image/png'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'タイトルを入力してください。',
            'author.required' => '著者名を入力してください。',
            'synopsis.between' => 'あらすじは0~200文字で入力してください。',
            'impressions.between' => '感想は0~200文字で入力してください。',
            'image.mimetypes' => '表紙画像はjpeg,png形式のファイルをアップロードしてください。'
        ];
    }
}
