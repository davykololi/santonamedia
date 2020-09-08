<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\SchemaOrg\Schema;
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
        $categoryPosts = $category->posts;
        $allPosts = Post::with('category','admin')->latest()->get();
        $allPostsSide = Post::latest()->limit(5)->get();
        $tags = Tag::with('posts')->get();

        $political = Category::where('name','Politics')->first();
        $politics = $political->posts()->inRandomOrder()->limit(2)->get();
        $politicSides = $political->posts()->latest()->limit(5)->get();

        $spt = Category::where('name','Sports')->first();
        $sports =  $spt->posts()->inRandomOrder()->limit(2)->get();
        $sportSides = $spt->posts()->latest()->limit(5)->get();

        $magazine = Category::where('name','Santona Magazine')->first();
        $magazines = $magazine->posts()->inRandomOrder()->limit(6)->get();

        $title = 'Home';
        $name = 'Santona Media Limited';
        $headline = 'Breaking News, Kenya, Africa, Politics, Business, Sports, Entertainment, Videos | HOME';
        $desc = 'The number one media house in Kenya offering exclusive latest breaking news in Kenya and around the globe';
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
        JsonLd::setType('WebSite');

        foreach ($allPosts as $post) {
            OpenGraph::addImage('https://santonamedia.com/storage/public/storage/'.$post->image,['height'=>'628','width' =>'1200']);
        }

        $webSite = Schema::WebSite()
                ->name($name)
                ->headline($headline)
                ->description($desc)
                ->email('santonamedia79@gmail.com')
                ->url(URL::current())
                ->sameAS("http://www.santonamedia.com")
                ->logo("https://santonamedia.com/static/logo.jpg");
                
        echo $webSite->toScript();

        $data = array(
                    'categories' => $categories,
                    'allPosts' => $allPosts,
                    'allPostsSide' => $allPostsSide,
                    'category' => $category,
                    'tags' => $tags,
                    'politics' => $politics,
                    'politicSides' => $politicSides,
                    'sports' => $sports,
                    'sportSides' => $sportSides,
                    'magazines' => $magazines,
                    'title' => $title,
                    );

        return view('welcome',$data);
    }
   }
}
