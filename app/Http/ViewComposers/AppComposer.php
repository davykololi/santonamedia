<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class AppComposer 
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */

    public function compose(View $view){
        $categories = Category::with('posts')->get();
        $navs = Category::with('posts')->limit(10)->get();
        $view->with(['categories'=>$categories,'navs'=>$navs]); 
    }
}
