<?php

namespace App\Http\Controllers\User;

use Str;
use App\Models\Admin;
use App\Models\User;
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
        $category = Category::query()->whereSlug($slug)->first();
        $videos = $category->videos()->with('admin','user','category','comments')->published()->latest()->paginate(5);
        $archives = $category->videos()->with('admin','user','category','comments')->published()->latest()->take(5)->get();
        $categories = Category::cursor();
        $tags = Tag::with('videos')->get();

        $allVideos = Video::with('admin','user','category','comments')->published()->inRandomOrder()->take(2)->get();
        $allVidSides = Video::with('admin','user','category','comments')->published()->latest()->take(5)->get();

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

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Articles');

        foreach($category->videos as $video){
        OpenGraph::addVideo('https://santonamedia.com/storage/public/videos/'.$video->video,
            ['secure_url' => 'https://santonamedia.com/storage/public/videos/'.$video->video,
            'type' => 'application/x-shockwave-flash','width' => 400,'height' => 300
            ]);
        OpenGraph::addImage('https://santonamedia.com/storage/public/videos/'.$video->video,
            ['secure_url' => 'https://santonamedia.com/storage/public/videos/'.$video->video,
            'height'=>'628','width' =>'1200'
        ]);
        }

        $videoArticles = Schema::NewsArticle()
                ->name($title)
                ->description($desc)
                ->datePublished($published)
                ->dateModified($modified)
                ->email('santonamedia79@gmail.com')
                ->url($url)
                ->sameAS("http://www.santonamedia.com")
                ->logo("https://santonamedia.com/static/logo.jpg");
        echo $videoArticles->toScript();
        
        $data = array(
            'category' => $category,
            'videos' => $videos,
            'archives' => $archives,
            'categories' => $categories,
            'tags' => $tags,
            'allVideos' => $allVidSides,
            'allVidSides' => $allVidSides,
        );

        return view('user.videos.index', $data);
    }

    public function getFullVideos($video_slug)
    {
        $video = Video::with('admin','user','comments','tags','category')->published()->where('videos.slug','=',$video_slug)->firstOrFail();
        $previous = $video->where('id','<',$video->id)->published()->orderBy('id','desc')->first();
        $next = $video->where('id','>',$video->id)->published()->orderBy('id')->first();
        $archives = $video->where('category_id','=',$video->category->id)->published()->latest()->take(5)->get();
        $category = $video->category()->with('videos')->firstOrFail();
        $videos = $category->videos()->with('admin','user','category','comments')->published()->inRandomOrder()->take(10)->get();
        $categories = Category::cursor();
        $tags = Tag::with('videos')->get();

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
        OpenGraph::addVideo('https://santonamedia.com/storage/public/videos/'.$video->video,
                            ['secure_url' => 'https://santonamedia.com/storage/public/videos/'.$video->video,
                            'type' => 'application/x-shockwave-flash','width' => 400,'height' => 300
                            ]);
        OpenGraph::addImage('https://santonamedia.com/storage/public/videos/'.$video->video,
            ['secure_url' => 'https://santonamedia.com/storage/public/videos/'.$video->video,
            'height'=>'628','width' =>'1200'
        ]);

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@santonamedia');
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
                ->email('santonamedia79@gmail.com')
                ->url($url)
                ->sameAS("http://www.santonamedia.com")
                ->logo("https://santonamedia.com/static/logo.jpg");
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
        $tag = Tag::query()->whereSlug($slug)->first();
        $tagVideos = $tag->videos()->with('admin','user','category','comments')->published()->latest()->get();
        $tagVidSides = $tag->videos()->with('admin','user','category','comments')->published()->latest()->take(5)->get();
        $categories = Category::cursor();
        $tags = Tag::with('videos')->get();

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

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Place');

        foreach($tagVideos as $video){
        OpenGraph::addVideo('https://santonamedia.com/storage/public/videos/'.$video->video,
            ['secure_url' => 'https://santonamedia.com/storage/public/videos/'.$video->video,
            'type' => 'application/x-shockwave-flash','width' => 400,'height' => 300
            ]);
        OpenGraph::addImage('https://santonamedia.com/storage/public/videos/'.$video->video,
            ['secure_url' => 'https://santonamedia.com/storage/public/videos/'.$video->video,
            'height'=>'628','width' =>'1200'
        ]);
        }

        $tagVids = Schema::NewsArticle()
                ->name($title)
                ->description($desc)
                ->datePublished($published)
                ->dateModified($modified)
                ->email('santonamedia79@gmail.com')
                ->url($url)
                ->sameAS("http://www.santonamedia.com")
                ->logo("https://santonamedia.com/static/logo.jpg");
        echo $tagVids->toScript();
        
        $data = array(
            'tag' => $tag,
            'tags' => $tags,
            'tagVideos' => $tagVideos,
            'tagVidSides' => $tagVidSides,
            'categories' => $categories,
        );

        return view('user.tags.videos', $data);
    }

    public function authors($slug)
    {
        $admin = Admin::query()->whereSlug($slug)->first();
        $adminVideos = $admin->videos()->with('admin','user','category','comments')->published()->latest()->get();
        $adminVidSides = $admin->videos()->with('admin','user','category','comments')->published()->latest()->take(5)->get();
        $categories = Category::cursor();
        $tags = Tag::with('videos')->get();

        foreach($adminVideos as $video){
            $video = Video::with('admin','category','comments')->get();
        }

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
        OpenGraph::addProperty('type','Person');

        TwitterCard::setTitle($name);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($title);
        TwitterCard::setUrl($url);

        JsonLd::setTitle($name);
        JsonLd::setDescription($title);
        JsonLd::setType('Person');

        foreach($adminVideos as $video){
        OpenGraph::addVideo('https://santonamedia.com/storage/public/videos/'.$video->video,
            ['secure_url' => 'https://santonamedia.com/storage/public/videos/'.$video->video,
            'type' => 'application/x-shockwave-flash','width' => 400,'height' => 300
            ]);
        OpenGraph::addImage('https://santonamedia.com/storage/public/videos/'.$video->video,
            ['secure_url' => 'https://santonamedia.com/storage/public/videos/'.$video->video,
            'height'=>'628','width' =>'1200'
        ]);
        }

        $adminVids = Schema::Person()
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

        echo $adminVids->toScript();
        
        $data = array(
            'admin' => $admin,
            'tags' => $tags,
            'adminVideos' => $adminVideos,
            'adminVidSides' => $adminVidSides,
            'categories' => $categories,
            'video' => $video,
        );

        return view('user.admins.videos', $data);
    }
}
