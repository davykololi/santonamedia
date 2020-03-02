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

        SEOMeta::setTitle('Santonamedia Latest News');
        SEOMeta::setDescription('Santonamedia latest News in Kenya,East Africa, Africa,Europe,Asia and Worldwide');
        SEOMeta::setKeywords('Santonamedia,latest, News,Kenya,East Africa, Africa,Europe,Asia,Worldwide');

        OpenGraph::setTitle('Santonamedia Latest News');
        OpenGraph::setDescription('Santonamedia latest News in Kenya,East Africa, Africa,Europe,Asia and Worldwide');
        OpenGraph::setUrl('https://santomedia.com/home');
        OpenGraph::addProperty('type','Home');

        Twitter::setTitle('Santonamedia Latest News');
        Twitter::setSite('@kololimdavid79');

        JsonLd::setTitle('Santonamedia Latest News');
        JsonLd::setDescription('Santonamedia latest News in Kenya,East Africa, Africa,Europe,Asia and Worldwide');

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
