<?php

namespace App\Http\Controllers;

use SEOMeta;
use OpenGraph;
use Twitter;
use JsonLd;
use App\Interfaces\PostInterface;
use App\Interfaces\VideoInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\TagInterface;
use Illuminate\Http\Request;
use Spatie\SchemaOrg\Schema;
use Illuminate\Support\Facades\URL;

class WelcomeController extends Controller
{
    protected $postRepository;
    protected $videoRepository;
    protected $categoryRepository;
    protected $tagRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostInterface $postRepository,CategoryInterface $categoryRepository,TagInterface $tagRepository,VideoInterface $videoRepository)
    {
        $this->postRepository = $postRepository;
        $this->videoRepository = $videoRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->categoryWithPosts();

        foreach($categories as $category){
        $categoryPosts = $category->posts()->published()->eagerLoaded()->get();
        $catPostsSide = $category->posts()->published()->eagerLoaded()->latest()->take(5)->get();
        $allPosts = $this->postRepository->allPublishedPosts();
        $allPostsSide = $this->postRepository->latestPublishedFive();
        $tags = $this->tagRepository->tagWithPosts();

        $poliCart = $this->categoryRepository->politicsCategory();
        $poliArticles = $poliCart->posts()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $poliSides = $poliCart->posts()->published()->eagerLoaded()->latest()->limit(5)->get();

        $sportCart = $this->categoryRepository->sportsCategory();
        $sportArticles = $sportCart->posts()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $sportSides = $sportCart->posts()->published()->eagerLoaded()->latest()->limit(5)->get();

        $techCart = $this->categoryRepository->tecnologyCategory();
        $techArticles=$techCart->posts()->published()->eagerLoaded()->inRandomOrder()->take(2)->get();
        $techSides = $techCart->posts()->published()->eagerLoaded()->latest()->take(5)->get();

        $magCart = $this->categoryRepository->santonaMagCategory();
        $magArticles = $magCart->posts()->published()->eagerLoaded()->inRandomOrder()->limit(6)->get();

        $videos = $this->videoRepository->randomnPublishedTwo();
        $videoSides = $this->videoRepository->latestPublishedFive();

        $title = 'Home';
        $name = 'Newstadia Media House';
        $headline = 'Breaking News, Kenya, Africa, Politics, Business, Sports, Entertainment, Videos | HOME';
        $desc = 'The Number One Media House Offering Exclusive Latest Breaking News In Kenya And Around The World';
        $keywords = 'Newstadia, Exclusive Breaking News, Online World News, Kenya Breaking News,Exclusive World News, News Video Clips, Business And Trade News, Kenya And World Political News, World Tecnological News, Exclusive Entertainment News In Kenya, Education, Trade And Travel, Health And Nutrition';
        $url = URL::current();

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($keywords);
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','articles');

        Twitter::setTitle($title);
        Twitter::setSite('@newstadia');
        Twitter::setDescription($desc);
        Twitter::setUrl($url);

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('WebSite');

        foreach ($allPosts as $post) {
            OpenGraph::addImage('https://newstadia.com/storage/public/storage/'.$post->image,['height'=>'628','width' =>'1200']);
        }

        $webSite = Schema::WebSite()
                ->name($name)
                ->headline($headline)
                ->description($desc)
                ->email('newstadia@gmail.com')
                ->url($url)
                ->sameAS("https://www.newstadia.com")
                ->logo("https://newstadia.com/static/logo.png");
                
        echo $webSite->toScript();

        $data = array(
                    'categories' => $categories,
                    'categoryPosts' => $categoryPosts,
                    'catPostsSide' => $catPostsSide,
                    'allPosts' => $allPosts,
                    'allPostsSide' => $allPostsSide,
                    'category' => $category,
                    'tags' => $tags,
                    'poliCart' => $poliCart,
                    'poliArticles' => $poliArticles,
                    'poliSides' => $poliSides,
                    'sportCart' => $sportCart,
                    'sportArticles' => $sportArticles,
                    'sportSides' => $sportSides,
                    'techCart' => $techCart,
                    'techArticles' => $techArticles,
                    'techSides' => $techSides,
                    'magCart' => $magCart,
                    'magArticles' => $magArticles,
                    'title' => $title,
                    'videos'=>$videos,
                    'videoSides'=>$videoSides,
                    );

        return view('welcome',$data);
    }
   }
}
