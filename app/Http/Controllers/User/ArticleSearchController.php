<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleSearchController extends Controller
{
    //
    public function index(Request $request)
    {
        $q = $request->get('q');
        $post = Post::where('title','LIKE','%'.$q.'%')->orWhere('slug','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')->get();
        if(count($post) > 0){
        return view('user.posts.read')->withPosts($post)->withQuery ($q);
    } else{
    
        return view ('user.posts.read')->withErrors("The article you search for can't be found. Continue searching for other articles");
    }
}
}
