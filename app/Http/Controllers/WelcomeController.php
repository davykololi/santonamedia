<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Video;
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
        $categoryPosts = $category->posts()->with('admin','user','category','comments')->published()->get();
        $allPosts = Post::with('admin','user','category','comments')->published()->latest()->get();
        $allPostsSide = Post::with('admin','user','category','comments')->published()->latest()->limit(5)->get();
        $tags = Tag::with('posts')->get();

        $political = Category::where('name','Politics')->first();
        $politics = $political->posts()->with('admin','user','category','comments')->published()->inRandomOrder()->limit(2)->get();
        $politicSides = $political->posts()->with('admin','user','category','comments')->published()->latest()->limit(5)->get();

        $spt = Category::where('name','Sports')->first();
        $sports =  $spt->posts()->with('admin','user','category','comments')->published()->inRandomOrder()->limit(2)->get();
        $sportSides = $spt->posts()->with('admin','user','category','comments')->published()->latest()->limit(5)->get();

        $techCart = Category::query()->whereName('Technology')->first();
        $techNews=$techCart->posts()->with('admin','category','user')->published()->withCount('comments')->inRandomOrder()->take(2)->get();
        $techSides = $techCart->posts()->with('admin','category','user')->published()->withCount('comments')->latest()->take(5)->get();

        $magazine = Category::where('name','Santona Magazine')->first();
        $magazines = $magazine->posts()->with('admin','user','category','comments')->published()->inRandomOrder()->limit(6)->get();

        $videos = Video::with('category','admin','user','comments')->published()->inRandomOrder()->limit(2)->get();
        $videoSides = Video::with('admin','category','user','comments')->published()->latest()->limit(5)->get();

        $title = 'Home';
        $name = 'Santona Media Limited';
        $headline = 'Breaking News, Kenya, Africa, Politics, Business, Sports, Entertainment, Videos | HOME';
        $desc = 'The number one media house in Kenya offering exclusive latest breaking news in Kenya and around the globe';
        $keywords = 'Santona Media, Latest news, Breaking news, news online, Kenya news, world news, Santona Media, news video, weather, business, money, politics, technology, entertainment, education, travel, health, special reports, autos';
        $url = URL::current();

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($keywords);
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','articles');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl($url);

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
                ->url($url)
                ->sameAS("http://www.santonamedia.com")
                ->logo("https://santonamedia.com/static/logo.jpg");
                
        echo $webSite->toScript();

        $data = array(
                    'categories' => $categories,
                    'allPosts' => $allPosts,
                    'allPostsSide' => $allPostsSide,
                    'category' => $category,
                    'tags' => $tags,
                    'political' => $political,
                    'politics' => $politics,
                    'politicSides' => $politicSides,
                    'spt' => $spt,
                    'sports' => $sports,
                    'sportSides' => $sportSides,
                    'techCart' => $techCart,
                    'techNews' => $techNews,
                    'techSides' => $techSides,
                    'magazine' => $magazine,
                    'magazines' => $magazines,
                    'title' => $title,
                    'videos'=>$videos,
                    'videoSides'=>$videoSides,
                    );

        return view('welcome',$data);
    }
   }
}
