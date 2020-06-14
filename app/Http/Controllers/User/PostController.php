<?php

namespace App\Http\Controllers\User;

use Str;
use App\User;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Category;
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
        $posts = $category->posts()->with('admin','category')->latest()->paginate(5);
        $archives = $category->posts()->latest()->limit(5)->get();
        $categories = Category::cursor();
        $tags = Tag::with('posts')->get();

        $title = $category->name;
        $desc = $category->description;

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
        
        foreach($category->posts as $post){
        OpenGraph::addImage('https://santonamedia.com/storage/public/storage/'.$post->image,['height'=>'628','width' =>'1200']);
        JsonLd::addImage('https://santonamedia.com/storage/public/storage/'.$post->image);
        TwitterCard::setImage('https://santonamedia.com/storage/public/storage/'.$post->image);
        }
        
        $data = array(
            'category' => $category,
            'posts' => $posts,
            'tags' => $tags,
            'archives' => $archives,
            'categories' => $categories
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
        $posts = $category->posts()->with('admin','category')->inRandomOrder()->paginate(5);
        $categories = Category::cursor();
        $tags = Tag::with('posts')->get();

        $title = $post->title;
        $desc = $post->description;

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($post->keywords);
        SEOMeta::addMeta('article:published_time', $post->created_at->toW3CString(),'property');
        SEOMeta::addMeta('article:section', strtolower($post->category->name),'property');
        SEOMeta::setCanonical(URL::current());

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type','article');
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

        $data = array(
            'post' => $post,
            'posts' => $posts,
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
        $posts = $tag->posts()->with('admin','category')->latest()->paginate(5);
        $archives = $tag->posts()->latest()->limit(5)->get();
        $categories = Category::cursor();
        $tags = Tag::with('posts')->get();

        $title = $tag->name;
        $desc = $tag->desc;

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
        
        $data = array(
            'tag' => $tag,
            'tags' => $tags,
            'posts' => $posts,
            'archives' => $archives,
            'categories' => $categories
        );

        return view('articles.show', $data);
    }  
}
