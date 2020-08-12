<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserPost extends FormRequest
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
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'image' =>'mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }

    public function messages()
    {
        $messages = [
            'username.required' => 'không được để trống phần này',
            'name.required' =>'không được để trống phần này',
            'email.required' =>'không được để trống phần này',
            'email.email' =>'vui lòng nhập vào định dạng email',
            'image.mimes:jpeg,jpg,png,gif' => 'chỉ nhận các file có đuôi .jpeg .jpg .png .gif',
            'image.max' => 'file ảnh quá nặng,vui lòng chọn file khác(nhỏ hơn 1mb)'
        ];

        return $messages;
    }
}
