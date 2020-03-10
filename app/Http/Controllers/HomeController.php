<?php

namespace App\Http\Controllers;

use SEO;
use JsonLd;
use SEOMeta;
use Twitter;
use OpenGraph;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

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

        $title = 'Santona Media Latest News';
        $desc = 'Santona Media latest News in Kenya,East Africa, Africa,Europe,Asia and America';
        $url = 'https://santonamedia.com/home';

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords('Santona,Media,latest,News,Kenya,East Africa, Africa,Europe,Asia,America');
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','articles');

        Twitter::setTitle($title);
        Twitter::setSite('@davycool30');

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);

        $data = array(
            'category' => $category,
            'posts' => $posts,
            'archives' => $archives,
            'categories' => $categories
        );

        return view('home',$data);
    }
}
}
