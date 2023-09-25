<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'MyBook/book/update') {
            return true;
        } else {
            return false;
        }
    }

    public function rules()
    {
        return [
            'synopsis' => 'between:0,200',
            'impressions' => 'between:0,200',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'synopsis.between' => 'あらすじは0~200文字で更新してください。',
            'impressions.between' => '感想は0~200文字で更新してください。',
        ];
    }
}
