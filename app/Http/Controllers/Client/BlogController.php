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
        $blog= Blog::all();
        return view('client.blog.index', compact('blog'));
    }

    public function detail($id)
    {
        $blog = Blog::findOrFail($id);
        $blogKey = 'blog_'.$blog->id;
        if(!\Illuminate\Support\Facades\Session::has($blogKey)){
            $blog->increment('view_count');
            \Illuminate\Support\Facades\Session::put($blogKey,1);
        }
        $randomBlogs = Blog::all()->random(2);
        return view('client.blog.detail', compact('blog','randomBlogs'));
    }
}
