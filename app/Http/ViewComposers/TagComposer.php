<?php

namespace App\Http\ViewComposers;

use App\Models\Tag;
use Illuminate\View\View;

class TagComposer 
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */

    public function compose(View $view){
        $tags = Tag::all();
        $view->with(['tags'=>$tags]);
    }
}
