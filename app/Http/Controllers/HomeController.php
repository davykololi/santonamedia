<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::with('posts')->get();

        foreach($categories as $category){
        $posts = $category->posts;
        $archives = Post::latest()->limit(10)->get();
        $posts = Post::latest()->paginate(10);
        $tags = Tag::with('posts')->get();

        foreach ($posts as $post) {
            OpenGraph::addImage('http://santonamedia.com/storage/public/storage',[$post->image,'height'=>'300','width' =>'300']);
        }

        $title = 'Latest breaking news in Kenya,East Africa,Africa,Europe,Asia and America';
        $desc = 'Latest news in Kenya,East Africa,Africa,Europe,Asia and America';
        $url = 'https://santonamedia.com/home';

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords('latest,news,Kenya,East Africa, Africa,Europe,Asia,America');
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','Homepage');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Homepage');
        
        $data = array(
            'category' => $category,
            'posts' => $posts,
            'tags' => $tags,
            'archives' => $archives,
            'categories' => $categories
        );

        return view('home',$data);
    }
}
}
