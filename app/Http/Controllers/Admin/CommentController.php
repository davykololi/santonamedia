<?php

namespace App\Http\Controllers\Admin;

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
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
    	$comments = Comment::latest()->get();

    	return view('admin.comments.index',compact('comments'));
	}

	public function delete(Comment $comment)
	{
		$comment->delete();

		return redirect()->route('admin.comments.index')->withSuccess('the comment deleted successfully');
	}
}
