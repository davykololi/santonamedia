<?php

namespace App\Http\Controllers\User;

use Str;
use SEOMeta;
use OpenGraph;
use Twitter;
use JsonLd;
use SEO;
use Share;
use App\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $archives = $category->posts()->latest()->limit(10)->get();
        $categories = Category::all();

        SEOMeta::setTitle(strtolower($category->name));
        SEOMeta::setDescription($category->description);
        SEOMeta::setKeywords($category->slug);
        SEOMeta::setCanonical('http://localhost:8888/categories',['slug','=',$category->slug]);

        OpenGraph::setTitle(strtolower($category->name));
        OpenGraph::setDescription($category->description);
        OpenGraph::setUrl('http://localhost:8888/categories',['slug','=',$category->slug]);
        OpenGraph::addProperty('type',strtolower($category->name));

        Twitter::setTitle(strtolower($category->name));
        Twitter::setSite('@kololimdavid79');

        JsonLd::setTitle(strtolower($category->name),'page');
        JsonLd::setDescription($category->description);
        JsonLd::addImage('http://localhost:8888/');

        $data = array(
            'category' => $category,
            'posts' => $posts,
            'archives' => $archives,
            'categories' => $categories
        );

        return view('user.posts.index', $data);
    }

    public function getFullNews($post_slug)
    {
        $post = Post::with('admin','user','comments')->where('posts.slug', '=', $post_slug)->firstOrFail();
        $previous = $post->where('id','<',$post->id)->orderBy('id','desc')->first();
        $next = $post->where('id','>',$post->id)->orderBy('id')->first();
        $archives = $post->where('category_id','=',$post->category->id)->latest()->limit(10)->get();
        $category = $post->category()->with('posts')->firstOrFail();
        $posts = $category->posts()->with('admin','category')->inRandomOrder()->paginate(5);
        $categories = Category::all();

        SEOMeta::setTitle(strtolower($post->title));
        SEOMeta::setDescription($post->description);
        SEOMeta::setKeywords($post->slug);
        SEOMeta::addMeta('article:published_time', $post->created_at->toW3CString(),'property');
        SEOMeta::addMeta('article:section', strtolower($post->category->name),'property');
        SEOMeta::setCanonical('http://localhost:8888/posts/read',['post_slug'=>$post->slug]);

        OpenGraph::setTitle(strtolower($post->title));
        OpenGraph::setDescription($post->description);
        OpenGraph::setUrl(url('/posts/read',$post->slug));
        OpenGraph::addProperty('type',strtolower($post->title));
        OpenGraph::addProperty('locale','pt-br');
        OpenGraph::addProperty('locale:alternate',['pt-pt','en-us']);
        OpenGraph::addImage();
        OpenGraph::addImage();
        OpenGraph::addImage(['url'=>'http://localhost/storage/public/storage',$post->image,'size' =>'300']);
        OpenGraph::addImage('http://localhost/storage/public/storage',[$post->image,'height'=>'300','width' =>'300']);

        JsonLd::setTitle(strtolower($post->title));
        JsonLd::setDescription($post->description);
        JsonLd::setType($post->category->name);

        $data = array(
            'post' => $post,
            'posts' => $posts,
            'previous' => $previous,
            'next' => $next,
            'archives' => $archives,
            'category' => $category,
            'categories' => $categories,
            );

        return view('user.posts.read', $data);
    }
        
}
