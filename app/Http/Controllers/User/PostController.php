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
        $categories = Category::cursor();

        $title = $category->name;
        $desc = $category->description;

        SEOMeta::setTitle(strtolower($title));
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($category->keywords);
        SEOMeta::setCanonical('https://santonamedia.com/categories',['slug'=>$category->slug],'/articles');

        OpenGraph::setTitle(strtolower($title));
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl('https://santonamedia.com/categories',['slug'=>$category->slug],'/articles');
        OpenGraph::addProperty('type','article');

        Twitter::setTitle(strtolower($title));
        Twitter::setSite('@davycool30');

        JsonLd::setTitle(strtolower($title));
        JsonLd::setDescription($desc);

        foreach($category->posts as $post){
        JsonLd::addImage('https://santonamedia.com/storage/public/storage',[$post->image,'height'=>'300','width' =>'300']);
        }
        
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
        $post = Post::with('admin','user','comments','tags')->where('posts.slug', '=', $post_slug)->firstOrFail();
        $previous = $post->where('id','<',$post->id)->orderBy('id','desc')->first();
        $next = $post->where('id','>',$post->id)->orderBy('id')->first();
        $archives = $post->where('category_id','=',$post->category->id)->latest()->limit(10)->get();
        $category = $post->category()->with('posts')->firstOrFail();
        $posts = $category->posts()->with('admin','category')->inRandomOrder()->paginate(5);
        $categories = Category::cursor();

        $title = $post->title;
        $desc = $post->description;

        SEOMeta::setTitle(strtolower($title));
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($post->keywords);
        SEOMeta::addMeta('article:published_time', $post->created_at->toW3CString(),'property');
        SEOMeta::addMeta('article:section', strtolower($post->category->name),'property');
        SEOMeta::setCanonical('https://santonamedia.com/posts/read',['post_slug'=>$post->slug]);

        OpenGraph::setTitle(strtolower($title));
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl('https://santonamedia.com/posts/read',['post_slug'=>$post->slug]);
        OpenGraph::addProperty('type','article');
        OpenGraph::addProperty('locale','en-us');
        OpenGraph::addImage(['url'=>'https://santonamedia.com/storage/public/storage',$post->image,'size' =>'300']);
        OpenGraph::addImage('https://santonamedia.com/storage/public/storage',[$post->image,'height'=>'300','width' =>'300']);
        Twitter::setTitle(strtolower($title));
        Twitter::setSite('@davycool30');

        JsonLd::setTitle(strtolower($title));
        JsonLd::setDescription($desc);
        JsonLd::setType('Article');
        JsonLd::addImage('https://santonamedia.com/storage/public/storage',[$post->image,'height'=>'300','width' =>'300']);

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
