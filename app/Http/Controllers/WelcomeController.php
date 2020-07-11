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
use Illuminate\Support\Facades\URL;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('posts')->get();

        foreach($categories as $category){
        $posts = $category->posts;
        $archives = Post::latest()->limit(5)->get();
        $posts = Post::latest()->paginate(10);
        $tags = Tag::with('posts')->get();

        foreach ($posts as $post) {
            OpenGraph::addImage('https://santonamedia.com/storage/public/storage/'.$post->image,['height'=>'628','width' =>'1200']);
        }

        $title = 'The media house for the latest breaking news in Kenya and around the world';
        $desc = 'The number one media house in Kenya offering exclusive latest breaking news in Kenya and worldwide';
        $keywords = 'Santona Media, Latest news, Breaking news, news online, Kenya news, world news, Santona Media, news video, weather, business, money, politics, technology, entertainment, education, travel, health, special reports, autos';

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($keywords);
        SEOMeta::setCanonical(URL::current());

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type','WebSite');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl(URL::current());

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Website');

        $data = array(
                    'categories' => $categories,
                    'posts' => $posts,
                    'archives' => $archives,
                    'category' => $category,
                    'tags' => $tags,
                    );

        return view('welcome',$data);
    }
   }
}
