<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    //
    public function index()
    {
      $posts = Post::all()->first();
      $categories = Category::all()->first();
     
      return response()->view('sitemap.index', [
          'posts' => $posts,
          'categories' => $categories,
      ])->header('Content-Type', 'text/xml');
    }

    public function posts()
    {
        $posts = Post::latest()->get();
        return response()->view('sitemap.posts', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }

    public function categories()
    {
        $categories = Category::all();
        return response()->view('sitemap.categories', [
            'categories' => $categories,
        ])->header('Content-Type', 'text/xml');
    }

    public function about()
    {
        return response()->view('sitemap.about')->header('Content-Type', 'text/xml');
    }

    public function contact()
    {
        return response()->view('sitemap.contact')->header('Content-Type', 'text/xml');
    }

    public function home()
    {
        return response()->view('sitemap.home')->header('Content-Type', 'text/xml');
    }


}
