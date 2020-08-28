<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use MongoDB\Driver\Session;

class BlogController extends Controller
{
    public function index()
    {
        $blog= Blog::where('status',1)->where('is_approved',1)->get();
        return view('client.blog.index', compact('blog'));
    }

    public function detail($slug)
    {
        $blog = Blog::where('slug',$slug)->first();;
        $blogKey = 'blog_'.$blog->id;
        if(!\Illuminate\Support\Facades\Session::has($blogKey)){
            $blog->increment('view_count');
            \Illuminate\Support\Facades\Session::put($blogKey,1);
        }
        $randomBlogs = Blog::where('status',1)->where('is_approved',1)->get()->random(2);
        return view('client.blog.detail', compact('blog','randomBlogs'));
    }

}
