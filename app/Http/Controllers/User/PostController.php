<?php

namespace App\Http\Controllers\User;

use Str;
use App\Models\Admin;
use App\Models\User;
use App\Models\Post;
use App\Models\Video;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Category;
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
     * @return \Illuminate\Http\Response
     */
    public function getIndex(string $slug)
    {
        $category = Category::query()->whereSlug($slug)->first();
        $categoryPosts = $category->posts()->with('admin','category','user')->published()->withCount('comments')->latest()->get();
        $catPostsSide = $category->posts()->with('admin','category','user')->published()->withCount('comments')->latest()->take(5)->get();
        $categories = Category::cursor();
        $tags = Tag::with('posts')->get();
        $videos = Video::with('category','admin','user')->published()->withCount('comments')->inRandomOrder()->take(2)->get();
        $videoSides = Video::with('admin','category','user')->published()->withCount('comments')->latest()->take(5)->get();

        $allPosts = Post::with('category','admin','user')->published()->withCount('comments')->inRandomOrder()->take(2)->get();
        $allSides = Post::latest()->published()->take(5)->get();

        $poliCart = Category::query()->whereName('Politics')->first();
        $politicArticles=$poliCart->posts()->with('admin','category','user')->published()->withCount('comments')->inRandomOrder()->take(2)->get();
        $poliSides = $poliCart->posts()->with('admin','category','user')->published()->withCount('comments')->latest()->take(5)->get();

        $sportCart = Category::query()->whereName('Sports')->first();
        $sportNews=$sportCart->posts()->with('admin','category','user')->published()->withCount('comments')->inRandomOrder()->take(2)->get();
        $sportSides = $sportCart->posts()->with('admin','category','user')->published()->withCount('comments')->latest()->take(5)->get();

        $techCart = Category::query()->whereName('Technology')->first();
        $techNews=$techCart->posts()->with('admin','category','user')->published()->withCount('comments')->inRandomOrder()->take(2)->get();
        $techSides = $techCart->posts()->with('admin','category','user')->published()->withCount('comments')->latest()->take(5)->get();

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
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl($url);
        TwitterCard::setType('summary_large_image');

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Articles');
        
        foreach($categoryPosts as $post){
        OpenGraph::addImage('https://santonamedia.com/storage/public/storage/'.$post->image,
            ['secure_url' => 'https://santonamedia.com/storage/public/storage/'.$post->image,
            'height'=>'628','width' =>'1200'
        ]);
        JsonLd::addImage('https://santonamedia.com/storage/public/storage/'.$post->image);
        TwitterCard::setImage('https://santonamedia.com/storage/public/storage/'.$post->image);
        }

        $newsArticles = Schema::NewsArticle()
                ->headline($title)
                ->description($desc)
                ->datePublished($published)
                ->dateModified($modified)
                ->email('santonamedia79@gmail.com')
                ->url($url)
                ->sameAS("http://www.santonamedia.com")
                ->logo("https://santonamedia.com/static/logo.jpg");
        echo $newsArticles->toScript();
        
        $data = array(
            'poliCart' => $poliCart,
            'sportCart' => $sportCart,
            'category' => $category,
            'categoryPosts' => $categoryPosts,
            'catPostsSide' => $catPostsSide,
            'tags' => $tags,
            'categories' => $categories,
            'videos' => $videos,
            'videoSides' => $videoSides,
            'allPosts' => $allPosts,
            'allSides' => $allSides,
            'politicArticles' => $politicArticles,
            'poliSides' => $poliSides,
            'sportNews' => $sportNews,
            'sportSides' => $sportSides,
            'techCart' => $techCart,
            'techNews' => $techNews,
            'techSides' => $techSides,
        );

        return view('user.posts.index', $data);
    }

    public function getFullNews(string $post_slug)
    {
        $post=Post::with('admin','tags','category','user')->published()->withCount('comments')->where('posts.slug','=',$post_slug)->firstOrFail();
        $previous = $post->where('id','<',$post->id)->published()->orderBy('id','desc')->first();
        $next = $post->where('id','>',$post->id)->published()->orderBy('id')->first();
        $archives = $post->where('category_id','=',$post->category->id)->published()->latest()->take(5)->get();
        $category = $post->category()->with('posts')->firstOrFail();
        $categoryPosts=$category->posts()->with('admin','category','user')->published()->withCount('comments')->inRandomOrder()->take(10)->get();
        $allPosts = Post::with('admin','category','user')->published()->withCount('comments')->latest()->get();
        $categories = Category::cursor();
        $tags = Tag::with('posts')->get();

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
        OpenGraph::addImage('https://santonamedia.com/storage/public/storage/'.$post->image,
            ['secure_url' => 'https://santonamedia.com/storage/public/storage/'.$post->image,
            'height'=>'628','width' =>'1200'
        ]);

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl($url);
        TwitterCard::setImage('https://santonamedia.com/storage/public/storage/'.$post->image);
        TwitterCard::setType('summary_large_image');

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Article');
        JsonLd::addImage('https://santonamedia.com/storage/public/storage/'.$post->image);

        $newsArticle = Schema::NewsArticle()
        		->headline($title)
                ->description($desc)
                ->image('https://santonamedia.com/storage/public/storage/'.$post->image)
                ->datePublished($published)
                ->dateModified($modified)
        		->email('santonamedia79@gmail.com')
        		->url($url)
        		->sameAS("http://www.santonamedia.com")
        		->logo("https://santonamedia.com/static/logo.jpg");
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
        $tag = Tag::query()->whereSlug($slug)->first();
        $tagPosts = $tag->posts()->with('admin','category','user')->published()->withCount('comments')->latest()->get();
        $tagPostsSide = $tag->posts()->with('admin','category','user')->published()->withCount('comments')->latest()->take(5)->get();
        $categories = Category::cursor();
        $tags = Tag::with('posts')->get();

        $allPosts = Post::with('category','admin','user')->published()->withCount('comments')->inRandomOrder()->take(2)->get();
        $allpostSides = Post::with('admin','category','user')->published()->withCount('comments')->latest()->take(5)->get();

        $politicsCart = Category::query()->whereName('Politics')->first();
        $politicsNews=$politicsCart->posts()->with('admin','user','category')->published()->withCount('comments')->inRandomOrder()->take(2)->get();
        $politicSides=$politicsCart->posts()->with('admin','user','category')->published()->withCount('comments')->latest()->take(5)->get();

        $sportsCart = Category::query()->whereName('Sports')->first();
        $sportsNews = $sportsCart->posts()->with('admin','user','category')->published()->withCount('comments')->inRandomOrder()->take(2)->get();
        $spSides = $sportsCart->posts()->with('admin','user','category')->published()->withCount('comments')->latest()->take(5)->get();

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
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl($url);
        TwitterCard::setType('summary_large_image');

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Place');

        foreach($tag->posts as $post){
        OpenGraph::addImage('https://santonamedia.com/storage/public/storage/'.$post->image,
            ['secure_url' => 'https://santonamedia.com/storage/public/videos/'.$post->image,
            'height'=>'628','width' =>'1200'
        ]);
        JsonLd::addImage('https://santonamedia.com/storage/public/storage/'.$post->image);
        TwitterCard::setImage('https://santonamedia.com/storage/public/storage/'.$post->image);
        }

        $tagArticles = Schema::NewsArticle()
                ->headline($title)
                ->description($desc)
                ->datePublished($published)
                ->dateModified($modified)
                ->email('santonamedia79@gmail.com')
                ->url($url)
                ->sameAS("http://www.santonamedia.com")
                ->logo("https://santonamedia.com/static/logo.jpg");

        echo $tagArticles->toScript();

        $data = array(
            'tag' => $tag,
            'tags' => $tags,
            'tagPosts' => $tagPosts,
            'tagPostsSide' => $tagPostsSide,
            'categories' => $categories,
            'allPosts' => $allPosts,
            'allpostSides' => $allpostSides,
            'politicsCart' => $politicsCart,
            'politicsNews' => $politicsNews,
            'politicSides' => $politicSides,
            'sportsCart' => $sportsCart,
            'sportsNews' => $sportsNews,
            'spSides' => $spSides,
        );

        return view('user.tags.posts', $data);
    } 

    public function authors(string $slug)
    {
        $admin = Admin::query()->whereSlug($slug)->first();
        $adminPosts = $admin->posts()->with('admin','user','category')->published()->withCount('comments')->latest()->get();
        $adminPostsSide = $admin->posts()->with('admin','user','category')->published()->withCount('comments')->latest()->take(5)->get();
        $categories = Category::cursor();
        $tags = Tag::with('posts')->get();

        $allPosts = Post::with('category','admin','user')->published()->withCount('comments')->inRandomOrder()->take(2)->get();
        $allpostSides = Post::latest()->published()->take(5)->get();

        $politicsCart = Category::query()->whereName('Politics')->first();
        $politicsNews=$politicsCart->posts()->with('admin','user','category')->published()->withCount('comments')->inRandomOrder()->take(2)->get();
        $politicSides=$politicsCart->posts()->with('admin','user','category')->published()->withCount('comments')->latest()->take(5)->get();

        $sportsCart = Category::query()->whereName('Sports')->first();
        $sportsNews = $sportsCart->posts()->with('admin','user','category')->published()->withCount('comments')->inRandomOrder()->take(2)->get();
        $spSides = $sportsCart->posts()->with('admin','user','category')->published()->withCount('comments')->latest()->take(5)->get();

        $name = $admin->name;
        $title = $admin->title;
        $email = $admin->email;
        $image = 'https://santonamedia.com/storage/public/storage/'.$admin->image;
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
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($title);
        TwitterCard::setUrl($url);
        TwitterCard::setType('summary_large_image');

        JsonLd::setTitle($name);
        JsonLd::setDescription($title);
        JsonLd::setType('Place');

        foreach($adminPosts as $post){
        OpenGraph::addImage('https://santonamedia.com/storage/public/storage/'.$post->image,['height'=>'628','width' =>'1200']);
        JsonLd::addImage('https://santonamedia.com/storage/public/storage/'.$post->image);
        TwitterCard::setImage('https://santonamedia.com/storage/public/storage/'.$post->image);
        }

        $adminArticles = Schema::Person()
                ->name($name)
                ->image($image)
                ->logo("https://santonamedia.com/static/logo.jpg")
                ->url($url)
                ->sameAS("http://www.santonamedia.com")
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
            'allPosts' => $allPosts,
            'allpostSides' => $allpostSides,
            'politicsNews' => $politicsNews,
            'politicSides' => $politicSides,
            'sportsNews' => $sportsNews,
            'spSides' => $spSides,
            'politicsCart' => $politicsCart,
            'sportsCart' => $sportsCart,
        );

        return view('user.admins.posts', $data);
    } 
}
