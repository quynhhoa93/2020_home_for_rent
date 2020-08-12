<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'title' =>'required|unique:blogs|max:255',
            'body' =>'required',
            'image' =>'mimes:jpeg,jpg,png,gif|required|max:10000',
        ];
    }

    public function messages()
    {
        $messages = [
            'title.required' => 'không được để trống phần này',
            'title.unique' => 'tiêu đề này đã có người đặt',
            'title.max' => 'tiêu đề có độ dài tối đa 255 ký tự',
            'body.required' =>'không được để trống phần này',
            'image.required' =>'không được để trống phần này',
            'image.mimes' => 'chỉ nhận các file có đuôi .jpeg .jpg .png .gif',
            'image.max' => 'file ảnh quá nặng,vui lòng chọn file khác(nhỏ hơn 1mb)'
        ];

        return $messages;
    }


}
