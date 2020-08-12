<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ChangePasswordPost;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use Intervention\Image\ImageManagerStatic as Image;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id',2)->get();
        return view('admin.pages.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.pages.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->about = $request->about;

        //upload image
        if ($request->hasFile('image')) {
            $image_tmp = Input::file('image');
            if ($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand(111, 99999) . '.' . $extension;
                $large_image_path = 'backend/img/users/large/' . $filename;
                $medium_image_path = 'backend/img/users/medium/' . $filename;
                $small_image_path = 'backend/img/users/small/' . $filename;

                //resize image
                Image::make($image_tmp)->save($large_image_path);
                Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                $large_image_path = 'backend/img/users/large/';
                $medium_image_path = 'backend/img/users/medium/';
                $small_image_path = 'backend/img/users/small/';

                if (file_exists($small_image_path . $user->image)) {
                    unlink($small_image_path . $user->image);
                    unlink($medium_image_path . $user->image);
                    unlink($large_image_path . $user->image);
                }
            }
        } else {
            $filename = $request->current_image;
        }

        $user->image = $filename;
        $user->save();
        toastr()->success('đã sửa thành công thông tin người dùng ');
        return redirect()->route('admin.getAdminUser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $large_image_path = 'backend/img/users/large/';
        $medium_image_path = 'backend/img/users/medium/';
        $small_image_path = 'backend/img/users/small/';

        if (file_exists($small_image_path.$user->image)){
            unlink($small_image_path.$user->image);
            unlink($medium_image_path.$user->image);
            unlink($large_image_path.$user->image);
        }

        $user->delete();
        toastr()->warning('đã xoa thành công một user');
        return redirect()->back();
    }


    public function getAdminUser(){
        return view('admin.pages.users.admin_user');
    }

    public function editPassword(){
        return view('admin.pages.users.change_password');
    }

    public function postEditPassword(ChangePasswordPost $request){
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        toastr()->success('đổi mật khẩu thành công');
        return redirect()->route('admin.getAdminUser');
    }
}
