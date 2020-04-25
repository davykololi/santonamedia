<?php

namespace App\Http\Controllers\Search;

use SEO;
use JsonLd;
use SEOMeta;
use Twitter;
use OpenGraph;
use App\Models\Tag;
use App\Models\Video;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchVideoController extends Controller
{
    //
    public function search(Request $request)
    {

        if($request->has('search')){
    		$videos = Video::search($request->get('search'))->get();
            $archives = Video::latest()->limit(10)->get();
            $categories = Category::cursor();
            $tags = Tag::with('posts')->get();
            foreach($categories as $category){
                $category = Category::with('videos')->get();
            }
    	} else{
    		$videos = Video::with('categories','comments','tags')->paginate(5);
            $archives = Video::latest()->limit(10)->get();
            $categories = Category::cursor();
            $tags = Tag::with('posts')->get();

            foreach($categories as $category){
                $category = Category::with('videos')->get();
            }
    	}

        $title = 'Searched Videos';
        $desc = 'Latest news in Kenya,East Africa, Africa,Europe,Asia and America';
        $url = 'http://santonamedia.com/video.lists';

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

    	return view('user.videos.index',compact('videos','archives','categories','tags','category'));
    }
}
