<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Requests\EditBlogPost;
use App\Http\Requests\StoreBlogPost;
use App\Notifications\AuthorPostApproved;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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
        $blogs = Blog::with('user')->latest()->get();
        return view('admin.pages.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        $blog = new Blog();
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

                //store image name in product table
                $blog->image = $filename;
            }
        }

        $blog->save();
        toastr()->success('đã thêm thành công một bài viết');
        return redirect()->route('admin.blogs.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::with('user')->find($id);
        dd($blog->user);
        return view('admin.pages.blogs.show',compact('blog'));
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
        return view('admin.pages.blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditBlogPost $request, $id)
    {
        $blog = Blog::find($id);
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
        return redirect()->route('admin.blogs.index');
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

    public function pending(){
        $blogs = Blog::where('is_approved',0)->get();
        return view('admin.pages.blogs.pending',compact('blogs'));
    }

    public function approve($id){
        $blog = Blog::find($id);
        if($blog->is_approved == 0){
            $blog->is_approved = 1 ;
            $blog->save();
            $blog->user->notify(new AuthorPostApproved($blog));

            toastr()->success('bai dang da duoc cap quyen');
        }else{
            toastr()->info('bai dang chua duoc cap quyen');
        }
        return redirect()->back();
    }
}
