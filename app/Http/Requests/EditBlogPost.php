<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBlogPost extends FormRequest
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
            'title' =>'required|max:255',
            'body' =>'required',
            'image' =>'mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }

    public function messages()
    {
        $messages = [
            'title.required' => 'không được để trống phần này',
            'title.max' => 'tiêu đề có độ dài tối đa 255 ký tự',
            'body.required' =>'không được để trống phần này',
            'image.mimes:jpeg,jpg,png,gif' => 'chỉ nhận các file có đuôi .jpeg .jpg .png .gif',
            'image.max' => 'file ảnh quá nặng,vui lòng chọn file khác(nhỏ hơn 1mb)'
        ];

        return $messages;
    }
}
