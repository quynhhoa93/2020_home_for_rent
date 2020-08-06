<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        // $blog= Blog::get();
        return view('client.blog.index');
    }

    public function detail()
    {
        // $blog = Blog::findOrFail($id);
        return view('client.blog.detail');
    }
}
