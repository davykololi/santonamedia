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
        $categories = Category::all();
        $navs = Category::limit(10)->get();
        $view->with(['categories'=>$categories,'navs'=>$navs]);
    }
}
