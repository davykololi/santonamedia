<?php

namespace App\Http\Controllers\User;

use Str;
use App\Admin;
use App\User;
use App\Models\Post;
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
    public function getIndex($slug)
    {
        $category = Category::whereSlug($slug)->first();
        $categoryPosts = $category->posts()->with('admin','category')->latest()->get();
        $catPostsSide = $category->posts()->latest()->limit(5)->get();
        $categories = Category::cursor();
        $tags = Tag::with('posts')->get();

        $allPosts = Post::with('category','admin')->inRandomOrder()->limit(2)->get();
        $allSides = Post::latest()->limit(5)->get();

        $poliCart = Category::whereName('Politics')->first();
        $politicArticles = $poliCart->posts()->inRandomOrder()->limit(2)->get();
        $poliSides = $poliCart->posts()->latest()->limit(5)->get();

        $sportCart = Category::whereName('Sports')->first();
        $sportNews = $sportCart->posts()->inRandomOrder()->limit(2)->get();
        $sportSides = $sportCart->posts()->latest()->limit(5)->get();

        $title = $category->name;
        $desc = $category->description;
        $published = $category->created_at;

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($category->keywords);
        SEOMeta::setCanonical(URL::current());

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type','Articles');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl(URL::current());
        TwitterCard::setType('summary_large_image');

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Articles');
        
        foreach($categoryPosts as $post){
        OpenGraph::addImage('https://santonamedia.com/storage/public/storage/'.$post->image,['height'=>'628','width' =>'1200']);
        JsonLd::addImage('https://santonamedia.com/storage/public/storage/'.$post->image);
        TwitterCard::setImage('https://santonamedia.com/storage/public/storage/'.$post->image);
        }

        $newsArticles = Schema::NewsArticle()
                ->headline($title)
                ->description($desc)
                ->datePublished($published)
                ->dateModified($published)
                ->email('santonamedia79@gmail.com')
                ->url(URL::current())
                ->sameAS("http://www.santonamedia.com")
                ->logo("https://santonamedia.com/static/logo.jpg");
        echo $newsArticles->toScript();
        
        $data = array(
            'category' => $category,
            'categoryPosts' => $categoryPosts,
            'catPostsSide' => $catPostsSide,
            'tags' => $tags,
            'categories' => $categories,
            'allPosts' => $allPosts,
            'allSides' => $allSides,
            'politicArticles' => $politicArticles,
            'poliSides' => $poliSides,
            'sportNews' => $sportNews,
            'sportSides' => $sportSides,
        );

        return view('user.posts.index', $data);
    }

    public function getFullNews($post_slug)
    {
        $post = Post::with('admin','user','comments','tags','category')->where('posts.slug', '=', $post_slug)->firstOrFail();
        $previous = $post->where('id','<',$post->id)->orderBy('id','desc')->first();
        $next = $post->where('id','>',$post->id)->orderBy('id')->first();
        $archives = $post->where('category_id','=',$post->category->id)->latest()->limit(5)->get();
        $category = $post->category()->with('posts')->firstOrFail();
        $categoryPosts = $category->posts()->with('admin','category')->inRandomOrder()->get();
        $allPosts = Post::with('category','admin')->latest()->get();
        $categories = Category::cursor();
        $tags = Tag::with('posts')->get();

        $title = $post->title;
        $desc = $post->description;
        $published = $post->created_at;

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($post->keywords);
        SEOMeta::addMeta('article:published_time', $post->created_at->toW3CString(),'property');
        SEOMeta::addMeta('article:section', strtolower($post->category->name),'property');
        SEOMeta::setCanonical(URL::current());

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type','Article');
        OpenGraph::addProperty('locale','en-us');
        OpenGraph::addImage('https://santonamedia.com/storage/public/storage/'.$post->image,['height'=>'628','width' =>'1200']);

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl(URL::current());
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
                ->dateModified($published)
        		->email('santonamedia79@gmail.com')
        		->url(URL::current())
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

    public function tags($slug)
    {
        $tag = Tag::whereSlug($slug)->first();
        $tagPosts = $tag->posts()->with('admin','category')->latest()->get();
        $tagPostsSide = $tag->posts()->latest()->limit(5)->get();
        $categories = Category::cursor();
        $tags = Tag::with('posts')->get();

        $allPosts = Post::with('category','admin')->inRandomOrder()->limit(2)->get();
        $allpostSides = Post::latest()->limit(5)->get();

        $politicsCart = Category::whereName('Politics')->first();
        $politicsNews = $politicsCart->posts()->inRandomOrder()->limit(2)->get();
        $politicSides = $politicsCart->posts()->latest()->limit(5)->get();

        $sportsCart = Category::whereName('Sports')->first();
        $sportsNews = $sportsCart->posts()->inRandomOrder()->limit(2)->get();
        $spSides = $sportsCart->posts()->latest()->limit(5)->get();

        $title = $tag->name;
        $desc = $tag->desc;
        $published = $tag->created_at;

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($tag->keywords);
        SEOMeta::setCanonical(URL::current());

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type','Place');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl(URL::current());
        TwitterCard::setType('summary_large_image');

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Place');

        foreach($tag->posts as $post){
        OpenGraph::addImage('https://santonamedia.com/storage/public/storage/'.$post->image,['height'=>'628','width' =>'1200']);
        JsonLd::addImage('https://santonamedia.com/storage/public/storage/'.$post->image);
        TwitterCard::setImage('https://santonamedia.com/storage/public/storage/'.$post->image);
        }

        $tagArticles = Schema::NewsArticle()
                ->headline($title)
                ->description($desc)
                ->datePublished($published)
                ->dateModified($published)
                ->email('santonamedia79@gmail.com')
                ->url(URL::current())
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
            'politicsNews' => $politicsNews,
            'politicSides' => $politicSides,
            'sportsNews' => $sportsNews,
            'spSides' => $spSides,
        );

        return view('user.tags.posts', $data);
    } 

    public function authors($slug)
    {
        $admin = Admin::whereSlug($slug)->first();
        $adminPosts = $admin->posts()->with('category','comments')->latest()->get();
        $adminPostsSide = $admin->posts()->latest()->limit(5)->get();
        $categories = Category::cursor();
        $tags = Tag::with('posts')->get();

        $allPosts = Post::with('category','admin')->inRandomOrder()->limit(2)->get();
        $allpostSides = Post::latest()->limit(5)->get();

        $politicsCart = Category::whereName('Politics')->first();
        $politicsNews = $politicsCart->posts()->inRandomOrder()->limit(2)->get();
        $politicSides = $politicsCart->posts()->latest()->limit(5)->get();

        $sportsCart = Category::whereName('Sports')->first();
        $sportsNews = $sportsCart->posts()->inRandomOrder()->limit(2)->get();
        $spSides = $sportsCart->posts()->latest()->limit(5)->get();

        $name = $admin->name;
        $title = $admin->title;
        $email = $admin->email;
        $image = 'https://santonamedia.com/storage/public/storage/'.$admin->image;
        $created = $admin->created_at;
        $modified = $admin->created_at;
        $phone = $admin->phone_no;
        $area = $admin->area;

        SEOMeta::setTitle($name);
        SEOMeta::setDescription($title);
        SEOMeta::setKeywords($admin->keywords);
        SEOMeta::setCanonical(URL::current());

        OpenGraph::setTitle($name);
        OpenGraph::setDescription($title);
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type','Place');

        TwitterCard::setTitle($name);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($title);
        TwitterCard::setUrl(URL::current());
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
                ->url(URL::current())
                ->sameAS("http://www.santonamedia.com")
                ->datePublished($created)
                ->dateModified($created)
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
        );

        return view('user.admins.posts', $data);
    } 
}
