<?php

namespace App\Http\Controllers\User;

use Str;
use App\Interfaces\VideoInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\TagInterface;
use App\Interfaces\AdminInterface;
use Spatie\SchemaOrg\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\URL;

class VideoController extends Controller
{
    protected $videoRepository;
    protected $categoryRepository;
    protected $tagRepository;
    protected $adminRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryInterface $categoryRepository,TagInterface $tagRepository,VideoInterface $videoRepository,AdminInterface $adminRepository)
    {
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
        $videos = $category->videos()->published()->eagerLoaded()->latest()->paginate(5);
        $archives = $category->videos()->published()->eagerLoaded()->latest()->take(5)->get();
        $categories = $this->categoryRepository->categoryWithVideos();
        $tags = $this->tagRepository->tagWithVideos();

        $entCart = $this->categoryRepository->entertainmentCategory();
        $entArticles = $entCart->videos()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $entSides = $entCart->videos()->published()->eagerLoaded()->latest()->limit(5)->get();

        $sportCart = $this->categoryRepository->sportsCategory();
        $sportArticles = $sportCart->videos()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $sportSides = $sportCart->videos()->published()->eagerLoaded()->latest()->limit(5)->get();

        $poliCart = $this->categoryRepository->politicsCategory();
        $poliArticles = $poliCart->videos()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $poliSides = $poliCart->videos()->published()->eagerLoaded()->latest()->limit(5)->get();

        $tecCart = $this->categoryRepository->tecnologyCategory();
        $tecArticles = $tecCart->videos()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $tecSides = $tecCart->videos()->published()->eagerLoaded()->latest()->limit(5)->get();

        $allVideos = $this->videoRepository->randomnPublishedTwo();
        $allVidSides = $this->videoRepository->latestPublishedFive();

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

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Articles');

        foreach($category->videos as $video){
        OpenGraph::addVideo('https://newsstadia.com/storage/public/videos/'.$video->video,
            ['secure_url' => 'https://newsstadia.com/storage/public/videos/'.$video->video,
            'type' => 'application/x-shockwave-flash','width' => 400,'height' => 300
            ]);
        OpenGraph::addImage('https://newsstadia.com/storage/public/videos/'.$video->video,
            ['secure_url' => 'https://newsstadia.com/storage/public/videos/'.$video->video,
            'height'=>'628','width' =>'1200'
        ]);
        }

        $videoArticles = Schema::NewsArticle()
                ->name($title)
                ->description($desc)
                ->datePublished($published)
                ->dateModified($modified)
                ->email('newsstadia@gmail.com')
                ->url($url)
                ->sameAS("http://www.newsstadia.com")
                ->logo("https://newsstadia.com/static/logo.jpg");
        echo $videoArticles->toScript();
        
        $data = array(
            'category' => $category,
            'videos' => $videos,
            'archives' => $archives,
            'categories' => $categories,
            'tags' => $tags,
            'entCart' => $entCart,
            'entArticles' => $entArticles,
            'entSides' => $entSides,
            'sportCart' => $sportCart,
            'sportArticles' => $sportArticles,
            'sportSides' => $sportSides,
            'poliCart' => $poliCart,
            'poliArticles' => $poliArticles,
            'poliSides' => $poliSides,
            'tecCart' => $tecCart,
            'tecArticles' => $tecArticles,
            'tecSides' => $tecSides,
            'allVideos' => $allVideos,
            'allVidSides' => $allVidSides,
        );

        return view('user.videos.index', $data);
    }

    public function getFullVideos(string $slug)
    {
        $video = $this->videoRepository->videoSlug($slug);
        $previous = $video->where('id','<',$video->id)->published()->orderBy('id','desc')->first();
        $next = $video->where('id','>',$video->id)->published()->orderBy('id')->first();
        $archives = $video->where('category_id','=',$video->category->id)->published()->latest()->take(5)->get();
        $category = $video->category()->with('videos')->firstOrFail();
        $videos = $category->videos()->published()->eagerLoaded()->inRandomOrder()->take(10)->get();
        $categories = $this->categoryRepository->all();
        $tags = $this->tagRepository->tagWithVideos();

        $title = $video->title;
        $desc = $video->description;
        $published = $video->created_at;
        $modified = $video->updated_at;
        $url = URL::current();

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($video->keywords);
        SEOMeta::addMeta('article:published_time', $video->created_at->toW3CString(),'property');
        SEOMeta::addMeta('article:section', strtolower($video->category->name),'property');
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','Article');
        OpenGraph::addProperty('locale','en-us');
        OpenGraph::addVideo('https://newsstadia.com/storage/public/videos/'.$video->video,
                            ['secure_url' => 'https://newsstadia.com/storage/public/videos/'.$video->video,
                            'type' => 'application/x-shockwave-flash','width' => 400,'height' => 300
                            ]);
        OpenGraph::addImage('https://newsstadia.com/storage/public/videos/'.$video->video,
            ['secure_url' => 'https://newsstadia.com/storage/public/videos/'.$video->video,
            'height'=>'628','width' =>'1200'
        ]);

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@newsstadia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl($url);

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Article');

        $videoArticle = Schema::NewsArticle()
                ->headline($title)
                ->description($desc)
                ->datePublished($published)
                ->dateModified($modified)
                ->email('newsstadia@gmail.com')
                ->url($url)
                ->sameAS("http://www.newsstadia.com")
                ->logo("https://newsstadia.com/static/logo.jpg");
        echo $videoArticle->toScript();

        $data = array(
            'video' => $video,
            'videos' => $videos,
            'previous' => $previous,
            'next' => $next,
            'archives' => $archives,
            'category' => $category,
            'categories' => $categories,
            'tags' => $tags,
            );

        return view('user.videos.read', $data);
    }

    public function tags(string $slug)
    {
        $tag = $this->tagRepository->tagSlug($slug);
        $tagVideos = $tag->videos()->published()->eagerLoaded()->latest()->get();
        $tagVidSides = $tag->videos()->published()->eagerLoaded()->latest()->take(5)->get();
        $allVideos = $this->videoRepository->randomnPublishedTwo();
        $allVidSides = $this->videoRepository->latestPublishedFive();
        $categories = $this->categoryRepository->all();
        $tags = $this->tagRepository->tagWithVideos();

        $entCart = $this->categoryRepository->entertainmentCategory();
        $entArticles = $entCart->videos()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $entSides = $entCart->videos()->published()->eagerLoaded()->latest()->limit(5)->get();

        $sportCart = $this->categoryRepository->sportsCategory();
        $sportArticles = $sportCart->videos()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $sportSides = $sportCart->videos()->published()->eagerLoaded()->latest()->limit(5)->get();

        $poliCart = $this->categoryRepository->politicsCategory();
        $poliArticles = $poliCart->videos()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $poliSides = $poliCart->videos()->published()->eagerLoaded()->latest()->limit(5)->get();

        $tecCart = $this->categoryRepository->tecnologyCategory();
        $tecArticles = $tecCart->videos()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $tecSides = $tecCart->videos()->published()->eagerLoaded()->latest()->limit(5)->get();

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

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Place');

        foreach($tagVideos as $video){
        OpenGraph::addVideo('https://newsstadia.com/storage/public/videos/'.$video->video,
            ['secure_url' => 'https://newsstadia.com/storage/public/videos/'.$video->video,
            'type' => 'application/x-shockwave-flash','width' => 400,'height' => 300
            ]);
        OpenGraph::addImage('https://newsstadia.com/storage/public/videos/'.$video->video,
            ['secure_url' => 'https://newsstadia.com/storage/public/videos/'.$video->video,
            'height'=>'628','width' =>'1200'
        ]);
        }

        $tagVids = Schema::NewsArticle()
                ->name($title)
                ->description($desc)
                ->datePublished($published)
                ->dateModified($modified)
                ->email('newsstadia@gmail.com')
                ->url($url)
                ->sameAS("http://www.newsstadia.com")
                ->logo("https://newsstadia.com/static/logo.jpg");
        echo $tagVids->toScript();
        
        $data = array(
            'tag' => $tag,
            'tags' => $tags,
            'tagVideos' => $tagVideos,
            'tagVidSides' => $tagVidSides,
            'categories' => $categories,
            'entCart' => $entCart,
            'entArticles' => $entArticles,
            'entSides' => $entSides,
            'sportCart' => $sportCart,
            'sportArticles' => $sportArticles,
            'sportSides' => $sportSides,
            'poliCart' => $poliCart,
            'poliArticles' => $poliArticles,
            'poliSides' => $poliSides,
            'tecCart' => $tecCart,
            'tecArticles' => $tecArticles,
            'tecSides' => $tecSides,
            'allVideos' => $allVideos,
            'allVidSides' => $allVidSides,
        );

        return view('user.tags.videos', $data);
    }

    public function authors(string $slug)
    {
        $admin = $this->adminRepository->adminSlug($slug);
        $adminVideos = $admin->videos()->published()->eagerLoaded()->latest()->get();
        $adminVidSides = $admin->videos()->published()->eagerLoaded()->latest()->take(5)->get();
        $categories = $this->categoryRepository->all();
        $tags = $this->tagRepository->tagWithVideos();
        $allVideos = $this->videoRepository->randomnPublishedTwo();
        $allVidSides = $this->videoRepository->latestPublishedFive();

        $entCart = $this->categoryRepository->entertainmentCategory();
        $entArticles = $entCart->videos()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $entSides = $entCart->videos()->published()->eagerLoaded()->latest()->limit(5)->get();

        $sportCart = $this->categoryRepository->sportsCategory();
        $sportArticles = $sportCart->videos()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $sportSides = $sportCart->videos()->published()->eagerLoaded()->latest()->limit(5)->get();

        $poliCart = $this->categoryRepository->politicsCategory();
        $poliArticles = $poliCart->videos()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $poliSides = $poliCart->videos()->published()->eagerLoaded()->latest()->limit(5)->get();

        $tecCart = $this->categoryRepository->tecnologyCategory();
        $tecArticles = $tecCart->videos()->published()->eagerLoaded()->inRandomOrder()->limit(2)->get();
        $tecSides = $tecCart->videos()->published()->eagerLoaded()->latest()->limit(5)->get();

        foreach($adminVideos as $video){
            $video = $this->videoRepository->withEagerload();
        }

        $name = $admin->name;
        $title = $admin->title;
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
        OpenGraph::addProperty('type','Person');

        TwitterCard::setTitle($name);
        TwitterCard::setSite('@newsstadia');
        TwitterCard::setDescription($title);
        TwitterCard::setUrl($url);

        JsonLd::setTitle($name);
        JsonLd::setDescription($title);
        JsonLd::setType('Person');

        foreach($adminVideos as $video){
        OpenGraph::addVideo('https://newsstadia.com/storage/public/videos/'.$video->video,
            ['secure_url' => 'https://newsstadia.com/storage/public/videos/'.$video->video,
            'type' => 'application/x-shockwave-flash','width' => 400,'height' => 300
            ]);
        OpenGraph::addImage('https://newsstadia.com/storage/public/videos/'.$video->video,
            ['secure_url' => 'https://newsstadia.com/storage/public/videos/'.$video->video,
            'height'=>'628','width' =>'1200'
        ]);
        }

        $adminVids = Schema::Person()
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

        echo $adminVids->toScript();
        
        $data = array(
            'admin' => $admin,
            'tags' => $tags,
            'adminVideos' => $adminVideos,
            'adminVidSides' => $adminVidSides,
            'categories' => $categories,
            'video' => $video,
            'entCart' => $entCart,
            'entArticles' => $entArticles,
            'entSides' => $entSides,
            'sportCart' => $sportCart,
            'sportArticles' => $sportArticles,
            'sportSides' => $sportSides,
            'poliCart' => $poliCart,
            'poliArticles' => $poliArticles,
            'poliSides' => $poliSides,
            'tecCart' => $tecCart,
            'tecArticles' => $tecArticles,
            'tecSides' => $tecSides,
            'allVideos' => $allVideos,
            'allVidSides' => $allVidSides,
        );

        return view('user.authors.videos', $data);
    }
}
