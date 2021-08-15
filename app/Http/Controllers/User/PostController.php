<?php

namespace App\Http\Controllers\User;

use Str;
use App\Interfaces\PostInterface as PostInt;
use App\Interfaces\VideoInterface as VideoInt;
use App\Interfaces\CategoryInterface as CatInt;
use App\Interfaces\TagInterface as TagInt;
use App\Interfaces\AdminInterface as AdminInt;
use Spatie\SchemaOrg\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\URL;

class PostController extends Controller
{
    protected $postRepository;
    protected $videoRepository;
    protected $categoryRepository;
    protected $tagRepository;
    protected $adminRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostInt $postRepository,CatInt $categoryRepository,TagInt $tagRepository,VideoInt $videoRepository,AdminInt $adminRepository)
    {
        $this->postRepository = $postRepository;
        $this->videoRepository = $videoRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
        $this->adminRepository = $adminRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(string $slug)
    {
        $category = $this->categoryRepository->categorySlug($slug);
        $categoryPosts = $category->posts()->published()->eagerLoaded()->latest()->get();
        $catPostsSide = $category->posts()->published()->eagerLoaded()->latest()->take(5)->get();
        $categories = $this->categoryRepository->categoryWithPosts();
        $tags = $this->tagRepository->tagWithPosts();

        $allPosts = $this->postRepository->randonmPublishedTwo();
        $allPostsSide = $this->postRepository->latestPublishedFive();

        $poliCart = $this->categoryRepository->politicsCategory();
        $poliArticles= $poliCart->posts()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
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

        $title = $category->name;
        $desc = $category->description;
        $published = $category->created_at;
        $modified = $category->updated_at;
        $url = URL::current();

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($category->keywords);
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','Articles');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@newsstadia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl($url);
        TwitterCard::setType('summary_large_image');

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Articles');
        
        foreach($categoryPosts as $post){
        OpenGraph::addImage('https://newsstadia.com/storage/public/storage/'.$post->image,
            ['secure_url' => 'https://newsstadia.com/storage/public/storage/'.$post->image,
            'height'=>'628','width' =>'1200'
        ]);
        JsonLd::addImage('https://newsstadia.com/storage/public/storage/'.$post->image);
        TwitterCard::setImage('https://newsstadia.com/storage/public/storage/'.$post->image);
        }

        $newsArticles = Schema::NewsArticle()
                ->headline($title)
                ->description($desc)
                ->datePublished($published)
                ->dateModified($modified)
                ->email('newsstadia@gmail.com')
                ->url($url)
                ->sameAS("http://www.newsstadia.com")
                ->logo("https://newsstadia.com/static/logo.jpg");
        echo $newsArticles->toScript();
        
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

        return view('user.posts.index', $data);
    }

    public function getFullNews(string $slug)
    {
        $post = $this->postRepository->postSlug($slug);
        $previous = $post->where('id','<',$post->id)->published()->orderBy('id','desc')->first();
        $next = $post->where('id','>',$post->id)->published()->orderBy('id')->first();
        $archives = $post->where('category_id','=',$post->category->id)->published()->latest()->take(5)->get();
        $category = $post->category()->with('posts')->firstOrFail();
        $categoryPosts=$category->posts()->published()->eagerLoaded()->inRandomOrder()->take(10)->get();
        $allPosts = $this->postRepository->allPublishedPosts();
        $categories = $this->categoryRepository->all();
        $tags = $this->tagRepository->tagWithPosts();

        $title = $post->title;
        $desc = $post->description;
        $published = $post->created_at;
        $modified = $post->updated_at;
        $url = URL::current();

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($post->keywords);
        SEOMeta::addMeta('article:published_time', $post->created_at->toW3CString(),'property');
        SEOMeta::addMeta('article:section', strtolower($post->category->name),'property');
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','Article');
        OpenGraph::addProperty('locale','en-us');
        OpenGraph::addImage('https://newsstadia.com/storage/public/storage/'.$post->image,
            ['secure_url' => 'https://newsstadia.com/storage/public/storage/'.$post->image,
            'height'=>'628','width' =>'1200'
        ]);

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@newsstadia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl($url);
        TwitterCard::setImage('https://newsstadia.com/storage/public/storage/'.$post->image);
        TwitterCard::setType('summary_large_image');

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Article');
        JsonLd::addImage('https://newsstadia.com/storage/public/storage/'.$post->image);

        $newsArticle = Schema::NewsArticle()
                ->headline($title)
                ->description($desc)
                ->image('https://newsstadia.com/storage/public/storage/'.$post->image)
                ->datePublished($published)
                ->dateModified($modified)
                ->email('newsstadia@gmail.com')
                ->url($url)
                ->sameAS("http://www.newsstadia.com")
                ->logo("https://newsstadia.com/static/logo.jpg");
        echo $newsArticle->toScript();

        $data = array(
            'post' => $post,
            'categoryPosts' => $categoryPosts,
            'allPosts' => $allPosts,
            'tags' => $tags,
            'previous' => $previous,
            'next' => $next,
            'archives' => $archives,
            'category' => $category,
            'categories' => $categories,
            );

        return view('user.posts.read', $data);
    }

    public function tags(string $slug)
    {
        $tag = $this->tagRepository->tagSlug($slug);
        $tagPosts = $tag->posts()->published()->eagerLoaded()->latest()->get();
        $tagPostsSide = $tag->posts()->published()->eagerLoaded()->latest()->take(5)->get();
        $allPosts = $this->postRepository->randonmPublishedTwo();
        $allPostsSide = $this->postRepository->latestPublishedFive();
        $categories = $this->categoryRepository->all();
        $tags = $this->tagRepository->tagWithPosts();

        foreach($categories as $category){
            $categoryPosts = $category->posts()->published()->eagerLoaded()->get();
            $catPostsSide = $category->posts()->published()->eagerLoaded()->latest()->take(5)->get();
        }

        $poliCart = $this->categoryRepository->politicsCategory();
        $poliArticles= $poliCart->posts()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $poliSides = $poliCart->posts()->published()->eagerLoaded()->latest()->limit(5)->get();

        $sportCart = $this->categoryRepository->sportsCategory();
        $sportArticles=$sportCart->posts()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $sportSides = $sportCart->posts()->published()->eagerLoaded()->latest()->limit(5)->get();

        $techCart = $this->categoryRepository->tecnologyCategory();
        $techArticles=$techCart->posts()->published()->eagerLoaded()->inRandomOrder()->take(2)->get();
        $techSides = $techCart->posts()->published()->eagerLoaded()->latest()->take(5)->get();

        $magCart = $this->categoryRepository->santonaMagCategory();
        $magArticles = $magCart->posts()->published()->eagerLoaded()->inRandomOrder()->limit(6)->get();

        $videos = $this->videoRepository->randomnPublishedTwo();
        $videoSides =  $this->videoRepository->latestPublishedFive();

        $title = $tag->name;
        $desc = $tag->desc;
        $published = $tag->created_at;
        $modified = $tag->updated_at;
        $url = URL::current();

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($tag->keywords);
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','Place');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@newsstadia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl($url);
        TwitterCard::setType('summary_large_image');

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Place');

        foreach($tag->posts as $post){
        OpenGraph::addImage('https://newsstadia.com/storage/public/storage/'.$post->image,
            ['secure_url' => 'https://newsstadia.com/storage/public/videos/'.$post->image,
            'height'=>'628','width' =>'1200'
        ]);
        JsonLd::addImage('https://newsstadia.com/storage/public/storage/'.$post->image);
        TwitterCard::setImage('https://newsstadia.com/storage/public/storage/'.$post->image);
        }

        $tagArticles = Schema::NewsArticle()
                ->headline($title)
                ->description($desc)
                ->datePublished($published)
                ->dateModified($modified)
                ->email('newsstadia@gmail.com')
                ->url($url)
                ->sameAS("http://www.newsstadia.com")
                ->logo("https://newsstadia.com/static/logo.jpg");

        echo $tagArticles->toScript();

        $data = array(
            'tag' => $tag,
            'tags' => $tags,
            'tagPosts' => $tagPosts,
            'tagPostsSide' => $tagPostsSide,
            'categories' => $categories,
            'category' => $category,
            'categoryPosts' =>$categoryPosts,
            'catPostsSide' => $catPostsSide,
            'allPosts' => $allPosts,
            'allPostsSide' => $allPostsSide,
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

        return view('user.tags.posts', $data);
    } 

    public function authors(string $slug)
    {
        $admin = $this->adminRepository->adminSlug($slug);
        $adminPosts = $admin->posts()->published()->eagerLoaded()->latest()->get();
        $adminPostsSide = $admin->posts()->published()->eagerLoaded()->latest()->take(5)->get();
        $categories = $this->categoryRepository->all();
        $tags = $this->tagRepository->tagWithPosts();
        $allPosts = $this->postRepository->randonmPublishedTwo();
        $allPostsSide = $this->postRepository->latestPublishedFive();

        foreach($categories as $category){
            $categoryPosts = $category->posts()->published()->eagerLoaded()->get();
            $catPostsSide = $category->posts()->published()->eagerLoaded()->latest()->take(5)->get();
        }

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

        $name = $admin->name;
        $title = $admin->title." ".$admin->name;
        $email = $admin->email;
        $image = 'https://newsstadia.com/storage/public/storage/'.$admin->image;
        $created = $admin->created_at;
        $modified = $admin->updated_at;
        $phone = $admin->phone_no;
        $area = $admin->area;
        $url = URL::current();

        SEOMeta::setTitle($name);
        SEOMeta::setDescription($title);
        SEOMeta::setKeywords($admin->keywords);
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($name);
        OpenGraph::setDescription($title);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','Place');

        TwitterCard::setTitle($name);
        TwitterCard::setSite('@newsstadia');
        TwitterCard::setDescription($title);
        TwitterCard::setUrl($url);
        TwitterCard::setType('summary_large_image');

        JsonLd::setTitle($name);
        JsonLd::setDescription($title);
        JsonLd::setType('Place');

        foreach($adminPosts as $post){
        OpenGraph::addImage('https://newsstadia.com/storage/public/storage/'.$post->image,['height'=>'628','width' =>'1200']);
        JsonLd::addImage('https://newsstadia.com/storage/public/storage/'.$post->image);
        TwitterCard::setImage('https://newsstadia.com/storage/public/storage/'.$post->image);
        }

        $adminArticles = Schema::Person()
                ->name($name)
                ->image($image)
                ->logo("https://newsstadia.com/static/logo.jpg")
                ->url($url)
                ->sameAS("http://www.newsstadia.com")
                ->datePublished($created)
                ->dateModified($modified)
                ->contactPoint([Schema::ContactPoint()
                ->email($email)
                ->phone($phone)
                ->areaServed($area)]);

        echo $adminArticles->toScript();

        $data = array(
            'admin' => $admin,
            'tags' => $tags,
            'adminPosts' => $adminPosts,
            'adminPostsSide' => $adminPostsSide,
            'categories' => $categories,
            'categoryPosts' => $categoryPosts,
            'catPostsSide' => $catPostsSide,
            'allPosts' => $allPosts,
            'allPostsSide' => $allPostsSide,
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

        return view('user.authors.posts', $data);
    } 
}
