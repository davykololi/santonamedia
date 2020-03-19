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
use App\Models\Video;
use App\Models\Comment;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $title = $category->name;
        $desc = $category->description;

        SEOMeta::setTitle(strtolower($title));
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($category->keywords);
        SEOMeta::setCanonical('https://santonamedia.com/news',['slug'=>$category->slug],'/videos');

        OpenGraph::setTitle(strtolower($title));
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl('https://santonamedia.com/news',['slug'=>$category->slug],'/videos');
        OpenGraph::addProperty('type','videos');

        Twitter::setTitle(strtolower($title));
        Twitter::setSite('@davycool30');

        JsonLd::setTitle(strtolower($title));
        JsonLd::setDescription($desc);

        foreach($category->videos as $video){
        OpenGraph::addVideo('https://santonamedia.com/storage/public/videos',[$video->video,'height'=>'240','width' =>'320']);
        }
        
        $data = array(
            'category' => $category,
            'videos' => $videos,
            'archives' => $archives,
            'categories' => $categories
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

        $title = $video->title;
        $desc = $video->description;

        SEOMeta::setTitle(strtolower($title));
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords($video->keywords);
        SEOMeta::addMeta('article:published_time', $video->created_at->toW3CString(),'property');
        SEOMeta::addMeta('article:section', strtolower($video->category->name),'property');
        SEOMeta::setCanonical('https://santonamedia.com/news/videos/details',['video_slug'=>$video->slug]);

        OpenGraph::setTitle(strtolower($title));
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl('https://santonamedia.com/news/videos/details',['video_slug'=>$video->slug]);
        OpenGraph::addProperty('type','article');
        OpenGraph::addProperty('locale','en-us');
        OpenGraph::addVideo('https://santonamedia.com/storage/public/videos',[$video->video,
                            'secure_url' => 'https://santonamedia.com/storage/public/videos',$video->video,
                            'type' => 'application/x-shockwave-flash','width' => 320,'height' => 240]);

        Twitter::setTitle(strtolower($title));
        Twitter::setSite('@davycool30');

        JsonLd::setTitle(strtolower($title));
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
            );

        return view('user.videos.read', $data);
    }
}
