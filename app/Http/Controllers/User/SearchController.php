<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\Video;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $searchterm = $request->input('query');

        $searchResults = (new Search())
                        ->registerModel(Post::class,['title','description'])
                        ->registerModel(Video::class,['title','description'])
                        ->registerModel(Admin::class,'name')
                        ->registerModel(Category::class,['name','description'])
                        ->registerModel(Tag::class,['name','desc'])
                        ->perform($searchterm);

        return view('user.search',compact('searchResults','searchterm'));
    }
}
