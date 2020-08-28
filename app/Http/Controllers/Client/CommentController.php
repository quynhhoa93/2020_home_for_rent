<?php

namespace App\Http\Controllers\Client;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function commentBlog($blog,Request $request){
        $comment = new Comment();
        $comment->blog_id = $blog;
        $comment->information_id = 1;
        $comment->user_id = Auth::id();
        $comment->com = $request->com;

        $comment->save();
        return redirect()->back();
    }

}
