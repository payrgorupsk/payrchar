<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogComment;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request, $singleBlog)
    {
    	$this->validate($request, [
    		'comment' => 'required|max:1000'
    	]);

        $comment = new BlogComment;
        $comment->blog_id = $singleBlog;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->back();
    }
}
