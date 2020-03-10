<?php

namespace App\Http\Controllers\User;

use Auth;
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
        $this->middleware('auth');
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
                ]);
    
        $comment = Comment::create([
                                    'content'=>$request->get('content'),
                                    'user_id'=>Auth::user()->id,
                                    'post_id'=>$request->get('post_id'),
                                    ]);
        return back();
    }
}
