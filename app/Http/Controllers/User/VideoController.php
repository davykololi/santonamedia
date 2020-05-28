<?php

namespace App\Http\Controllers\User;

use Str;
use App\User;
use App\Models\Video;
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

class VideoController extends Controller
{
    //
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
        $videos = $category->videos()->with('admin','category')->latest()->paginate(5);
        $archives = $category->videos()->latest()->limit(10)->get();
        $categories = Category::cursor();
        $tags = Tag::with('videos')->get();

        $title = $category->name;
        $desc = $category->description;

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($category->keywords);
        SEOMeta::setCanonical('https://santonamedia.com/news',['slug'=>$category->slug],'/videos');

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl('https://santonamedia.com/news',['slug'=>$category->slug],'/videos');
        OpenGraph::addProperty('type','Videos');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Videos');

        foreach($category->videos as $video){
        OpenGraph::addVideo('https://santonamedia.com/storage/public/videos',[$video->video,'height'=>'240','width' =>'320']);
        }
        
        $data = array(
            'category' => $category,
            'videos' => $videos,
            'archives' => $archives,
            'categories' => $categories,
            'tags' => $tags,
        );

        return view('user.videos.index', $data);
    }

    public function getFullVideos($video_slug)
    {
        $video = Video::with('admin','user','comments','tags','category')->where('videos.slug','=',$video_slug)->firstOrFail();
        $previous = $video->where('id','<',$video->id)->orderBy('id','desc')->first();
        $next = $video->where('id','>',$video->id)->orderBy('id')->first();
        $archives = $video->where('category_id','=',$video->category->id)->latest()->limit(10)->get();
        $category = $video->category()->with('videos')->firstOrFail();
        $videos = $category->videos()->with('admin','category')->inRandomOrder()->paginate(5);
        $categories = Category::cursor();
        $tags = Tag::with('videos')->get();

        $title = $video->title;
        $desc = $video->description;

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($video->keywords);
        SEOMeta::addMeta('article:published_time', $video->created_at->toW3CString(),'property');
        SEOMeta::addMeta('article:section', strtolower($video->category->name),'property');
        SEOMeta::setCanonical('https://santonamedia.com/news/videos/details',['video_slug'=>$video->slug]);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl('https://santonamedia.com/news/videos/details',['video_slug'=>$video->slug]);
        OpenGraph::addProperty('type','Video');
        OpenGraph::addProperty('locale','en-us');
        OpenGraph::addVideo('https://santonamedia.com/storage/public/videos',[$video->video,
                            'secure_url' => 'https://santonamedia.com/storage/public/videos',$video->video,
                            'type' => 'application/x-shockwave-flash','width' => 320,'height' => 240]);

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Video');

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

    public function tags($slug)
    {
        $tag = Tag::whereSlug($slug)->first();
        $videos = $tag->videos()->with('admin','category')->latest()->paginate(5);
        $archives = $tag->videos()->latest()->limit(10)->get();
        $categories = Category::cursor();
        $tags = Tag::with('videos')->get();

        $title = $tag->name;
        $desc = $tag->desc;

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($tag->keywords);
        SEOMeta::setCanonical('https://santonamedia.com/news/videos',['slug'=>$tag->slug]);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl('https://santonamedia.com/news/videos',['slug'=>$tag->slug]);
        OpenGraph::addProperty('type','Place');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::addImage('https://santonamedia.com/public/static/globe.png');
        JsonLd::setType('Place');

        foreach($tag->videos as $video){
        OpenGraph::addVideo('https://santonamedia.com/storage/public/storage',[$video->video,'height'=>'300','width' =>'300']);
        }
        
        $data = array(
            'tag' => $tag,
            'tags' => $tags,
            'videos' => $videos,
            'archives' => $archives,
            'categories' => $categories,
        );

        return view('user.tags.videos', $data);
    }
}
