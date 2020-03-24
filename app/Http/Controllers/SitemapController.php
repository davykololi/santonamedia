<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    //
    public function index()
    {
      $posts = Post::all()->first();
      $videos = Video::all()->first();
      $categories = Category::all()->first();
     
      return response()->view('sitemap.index', [
          'posts' => $posts,
          'videos' => $videos,
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

    public function videos()
    {
        $videos = Video::latest()->get();
        return response()->view('sitemap.videos', [
            'videos' => $videos,
        ])->header('Content-Type', 'text/xml');
    }

    public function tagArticles()
    {
        $tags = Tag::all();
        return response()->view('sitemap.tagarticles', [
            'tags' => $tags,
        ])->header('Content-Type', 'text/xml');
    }

    public function tagVideos()
    {
        $tags = Tag::all();
        return response()->view('sitemap.tagvideos', [
            'tags' => $tags,
        ])->header('Content-Type', 'text/xml');
    }

    public function categoryArticles()
    {
        $categories = Category::all();
        return response()->view('sitemap.catarticles', [
            'categories' => $categories,
        ])->header('Content-Type', 'text/xml');
    }

    public function categoryVideos()
    {
        $categories = Category::all();
        return response()->view('sitemap.catvideos', [
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
