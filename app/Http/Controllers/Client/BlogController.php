<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blog= Blog::paginate();
        return view('client.blog.index', compact('blog'));
    }

    public function detail($id)
    {
        $blog = Blog::findOrFail($id);
        return view('client.blog.detail', compact('blog'));
    }
}
