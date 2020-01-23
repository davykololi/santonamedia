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
        $categories = Category::with('posts')->latest()->get();

        foreach($categories as $category){
        $posts = $category->posts;
        $archives = Post::latest()->limit(10)->get();
        $posts = Post::latest()->paginate(10);

        SEOMeta::setTitle('Home');
        SEOMeta::setDescription('Skylux Blog Home Page');
        SEOMeta::setKeywords('Skylux,Blog,Home,Page');

        OpenGraph::setTitle('Home');
        OpenGraph::setDescription('Skylux Blog Home Page');
        OpenGraph::setUrl('http://localhost:8888/home');
        OpenGraph::addProperty('type','Home');

        Twitter::setTitle('Home');
        Twitter::setSite('@kololimdavid79');

        JsonLd::setTitle('Home Page');
        JsonLd::setDescription('Skylux Blog Home Page');

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
