<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class RegistrationController extends Controller
{
    public function Signup(Request $request)
    {
        dd($request->all());
        $request->validate([
            'name'=> 'required|unique:users,name',
            'email'=> 'required|unique:users,email|email',
            'password'=>'required|min:6|max:20',
            'confirm'=> 'required|same:password',
        ],[
            'name.required' => 'Tên đăng nhập không được để trống.',
            'name.unique'=>'Tên đăng nhập đã được sử dụng.',
            'email.required'=>'Email không được để trống.',
            'email.unique'=>'Tên đăng nhập đã được sử dụng.',
            'email.email'=>'Địa chỉ email không hợp lệ.',
            'password.required'=>'Mật khẩu không được để trống.',
            'password.min'=>'Mật khẩu phải có độ dài từ 6 ký tự.',
            'password.max'=>'Mật khẩu không quá 20 kí tự.',
            'confirm.required'=>'Xác thực mật khẩu không được để trống.',
            'confirm.same'=>'Xác thực mật khẩu không đúng.'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
    }
}
