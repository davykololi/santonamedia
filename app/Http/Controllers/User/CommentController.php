<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Models\Video;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
                'content'=>'required',
                'name'=>'required',
                'email'=>'required',
                ]);
    
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->commentable_id = $request->commentable_id;
        $comment->commentable_type = $request->commentable_type;
        $comment->user_id = Auth::guest();
        $comment->save();

        return back();
    }
}
