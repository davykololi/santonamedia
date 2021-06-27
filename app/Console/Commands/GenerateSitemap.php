<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\Post;
use App\Models\Video;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create()
        		->add(Url::create('/newsletter'))
        		->add(Url::create('/contact-us'))
        		->add(Url::create('/about-us'))
        		->add(Url::create('/private-policy'))
        		->add(Url::create('/portfolio'));

        $categories = Category::get();
        foreach($categories as $category){
        	$sitemap->add(Url::create('/'.$category->slug.'/articles'));
        }

        foreach($categories as $category){
        	$sitemap->add(Url::create('/'.$category->slug.'/videos'));
        }

        $posts = Post::published()->get();
        foreach($posts as $post){
        	$sitemap->add(Url::create('/articles/'.$post->slug));
        }

        $videos = Video::published()->get();
        foreach($videos as $video){
        	$sitemap->add(Url::create('/videos/'.$video->slug));
        }

        $tags = Tag::get();
        foreach($tags as $tag){
        	$sitemap->add(Url::create('/vids/'.$tag->slug));
        }

        foreach($tags as $tag){
        	$sitemap->add(Url::create('/news/'.$tag->slug));
        }

        $admins = Admin::get();
        foreach($admins as $admin){
        	$sitemap->add(Url::create('/article-author/'.$admin->slug));
        }

        foreach($admins as $admin){
        	$sitemap->add(Url::create('/video-author/'.$admin->slug));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
