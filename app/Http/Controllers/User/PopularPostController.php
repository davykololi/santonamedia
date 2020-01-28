<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PopularPostController extends Controller
{
    //
    public function popular()
    {
    	$popularPosts = Post::with('admin','comments')->popular()->get();

    	return view('user.posts.popular',compact('popularPosts'));
    }
}
