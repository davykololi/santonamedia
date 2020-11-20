<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:superadmin');
    }
    
    public function index()
    {
    	$comments = Comment::latest()->get();

    	return view('superadmin.comments.index',compact('comments'));
	}

    public function show(Comment $comment)
    {

        return view('superadmin.comments.show',compact('comment'));
    }

	public function delete(Comment $comment)
	{
		$comment->delete();

		return redirect()->route('superadmin.comments.index')->withSuccess('the comment deleted successfully');
	}
}
