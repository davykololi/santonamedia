<?php

namespace App\Http\ViewComposers;

use App\Models\Post;
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
        $categories = Category::all();
        $navs = Category::limit(5)->get();
        $view->with(['categories'=>$categories,'navs'=>$navs,]);
    }
}
