<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Models\Post;
use App\Models\Comment;
use App\Events\CommentSent;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Post $post)
    {
        return $post->comments()->with('user')->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Post $post)
    {
        $this->validate(request(),[
                'content'=>'required',
                ]);
        $user = Auth::user();

        $comment = Comment::create([
                    'user_id'=>$user->id,
                    'post_id'=>$post->id,
                    'content'=>request('content'),
                ]);
        broadcast(new CommentSent($user,$comment))->toOthers();

        return ['status'=>'Message sent'];
    }
}
