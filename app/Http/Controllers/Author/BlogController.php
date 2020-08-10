<?php

namespace App\Http\Controllers\Author;

use App\Blog;
use App\Notifications\NewAuthorPost;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Notification;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Auth::user()->blogs()->latest()->get();
        return view('author.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = str_slug($request->title);
        $blog->user_id = Auth::id();
        $blog->body = $request->body;
        $blog->status = $request->status;
        $blog->is_approved = 0;

        //upload image
        if ($request->hasFile('image')) {
            $image_tmp = Input::file('image');
            if ($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand(111, 99999) . '.' . $extension;
                $large_image_path = 'backend/img/blog/large/' . $filename;
                $medium_image_path = 'backend/img/blog/medium/' . $filename;
                $small_image_path = 'backend/img/blog/small/' . $filename;

                //resize image
                Image::make($image_tmp)->save($large_image_path);
                Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                //store image name in product table
                $blog->image = $filename;
            }
        }

        $blog->save();

        $users = User::where('role_id',1)->get();
        Notification::send($users,new NewAuthorPost($blog));

        toastr()->success('đã thêm thành công một bài viết');
        return redirect()->route('author.blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        if($blog->user_id != Auth::id()){
            toastr()->error('ban khong thuc hien duoc chuc nang nay');
            return redirect()->back();
        }
        return view('author.blogs.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        if($blog->user_id != Auth::id()){
            toastr()->error('ban khong thuc hien duoc chuc nang nay');
            return redirect()->back();
        }
        return view('author.blogs.edit',compact('blog'));
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

        $blog = Blog::find($id);
        if($blog->user_id != Auth::id()){
            toastr()->error('ban khong thuc hien duoc chuc nang nay');
            return redirect()->back();
        }
        $blog->title = $request->title;
        $blog->slug = str_slug($request->title);
        $blog->user_id = Auth::id();
        $blog->body = $request->body;
        $blog->status = $request->status;
        $blog->is_approved = 1;

        //upload image
        if ($request->hasFile('image')) {
            $image_tmp = Input::file('image');
            if ($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand(111, 99999) . '.' . $extension;
                $large_image_path = 'backend/img/blog/large/' . $filename;
                $medium_image_path = 'backend/img/blog/medium/' . $filename;
                $small_image_path = 'backend/img/blog/small/' . $filename;

                //resize image
                Image::make($image_tmp)->save($large_image_path);
                Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                $large_image_path = 'backend/img/blog/large/';
                $medium_image_path = 'backend/img/blog/medium/';
                $small_image_path = 'backend/img/blog/small/';

                if (file_exists($small_image_path.$blog->image)){
                    unlink($small_image_path.$blog->image);
                    unlink($medium_image_path.$blog->image);
                    unlink($large_image_path.$blog->image);
                }
            }
        } else{
            $filename = $request->current_image;
        }

        $blog->image = $filename;
        $blog->save();
        toastr()->success('đã sửa thành công bài viết');
        return redirect()->route('author.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        if($blog->user_id != Auth::id()){
            toastr()->error('ban khong thuc hien duoc chuc nang nay');
            return redirect()->back();
        }
        $large_image_path = 'backend/img/blog/large/';
        $medium_image_path = 'backend/img/blog/medium/';
        $small_image_path = 'backend/img/blog/small/';

        if (file_exists($small_image_path.$blog->image)){
            unlink($small_image_path.$blog->image);
            unlink($medium_image_path.$blog->image);
            unlink($large_image_path.$blog->image);
        }

        $blog->delete();
        toastr()->warning('đã xoa thành công một bài viết');
        return redirect()->back();
    }

}
