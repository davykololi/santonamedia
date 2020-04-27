<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function register()
    {
        
    }

    public function boot()
    {
        //
        View::composer(
            'layouts.app',
            'App\Http\ViewComposers\AppComposer'
        );

        View::composer(
            'layouts.app',
            'App\Http\ViewComposers\TagComposer'
        );

    }
}
