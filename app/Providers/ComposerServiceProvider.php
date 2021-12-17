<?php

namespace App\Providers;

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
