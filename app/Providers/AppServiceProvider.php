<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Observers\PostObserver;
use App\Observers\VideoObserver;
use App\Observers\AdminObserver;
use App\Observers\TagObserver;
use App\Observers\CategoryObserver;
use App\Observers\CommentObserver;
use App\Models\Post;
use App\Models\Video;
use App\Models\Admin;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Comment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        Post::observe(PostObserver::class);
        Video::observe(VideoObserver::class);
        Admin::observe(AdminObserver::class);
        Tag::observe(TagObserver::class);
        Category::observe(CategoryObserver::class);
        Comment::observe(CommentObserver::class);
    }
}
