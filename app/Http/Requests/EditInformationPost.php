<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditInformationPost extends FormRequest
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
            'name'=>'required|max:255',
            'address'=>'required|max:255',
            'description'=>'required',
            'price'=>'required|integer',
            'image'=>'mimes:jpeg,jpg,png,gif|max:10000'
        ];
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'không được để trống phần này',
            'name.max' => 'tiêu đề có độ dài tối đa 255 ký tự',
            'address.max' => 'địa chỉ có độ dài tối đa 255 ký tự',
            'price.required'=>'không được để trống phần này',
            'description.required'=>'không được để trống phần này',
            'price.integer'=>'giá phải là số',
            'address.required' =>'không được để trống phần này',
            'image.mimes:jpeg,jpg,png,gif' => 'chỉ nhận các file có đuôi .jpeg .jpg .png .gif',
            'image.max' => 'file ảnh quá nặng,vui lòng chọn file khác(nhỏ hơn 1mb)'
        ];

        return $messages;
    }
}
