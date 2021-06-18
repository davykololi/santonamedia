<?php

namespace App\Providers;

use App;
use App\Interfaces\TagInterface;
use App\Interfaces\PostInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\AdminInterface;
use App\Interfaces\VideoInterface;
use App\Repositories\TagRepository;
use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\AdminRepository;
use App\Repositories\VideoRepository;
use Illuminate\Support\ServiceProvider;

class GeneralServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        App::bind(PostInterface::class,PostRepository::class);
        App::bind(CategoryInterface::class,CategoryRepository::class);
        App::bind(TagInterface::class,TagRepository::class);
        App::bind(AdminInterface::class,AdminRepository::class);
        App::bind(VideoInterface::class,VideoRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
