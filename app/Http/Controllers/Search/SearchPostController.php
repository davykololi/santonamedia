<?php

namespace App\Http\Controllers\Search;

use SEO;
use JsonLd;
use SEOMeta;
use Twitter;
use OpenGraph;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchPostController extends Controller
{
    //
    public function search(Request $request)
    {

    	if($request->has('search')){
    		$posts = Post::search($request->get('search'))->get();
            $archives = Post::latest()->limit(10)->get();
            $categories = Category::cursor();
            $tags = Tag::with('posts')->get();
            foreach($categories as $category){
                $category = Category::with('posts')->get();
            }
    	} else{
    		$posts = Post::with('categories','comments','tags')->paginate(5);
            $archives = Post::latest()->limit(10)->get();
            $categories = Category::cursor();
            $tags = Tag::with('posts')->get();

            foreach($categories as $category){
                $category = Category::with('posts')->get();
            }
    	}

        $title = 'Searched Articles';
        $desc = 'Latest news in Kenya,East Africa, Africa,Europe,Asia and America';
        $url = 'http://santonamedia.com/post.lists';

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords('latest,news,Kenya,East Africa, Africa,Europe,Asia,America');
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','articles');

        Twitter::setTitle($title);
        Twitter::setSite('@davycool30');

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);

    	return view('user.posts.index',compact('posts','archives','categories','tags','category'));
    }
}
