<?php

namespace App\Http\Controllers\Admin;

use Image;
use File;
use App\Services\TagService;
use App\Services\PostService;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\PostFormRequest as StoreRequest;
use App\Http\Requests\PostFormRequest as UpdateRequest;

class PostController extends Controller
{
    protected $postService;
    protected $categoryService;
    protected $tagService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostService $postService,CategoryService $categoryService,TagService $tagService)
    {
        $this->middleware('auth:admin');
        $this->postService = $postService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = $this->postService->authPosts();

        return view('admin.posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = $this->tagService->all()->pluck('name','id');
        $categories = $this->categoryService->all();

        return view('admin.posts.create',['categories'=>$categories,'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    { 
        $post = $this->postService->create($request);
        $tags = $request->tags;
        $post->tags()->sync($tags);
        Toastr::success('The post created successfully :)','Success');

        return redirect()->route('admin.posts.index')->withSuccess(ucwords($post->title." ".'Post created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = $this->postService->getId($id);

        return view('admin.posts.show',['post'=> $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = $this->postService->getId($id);
        $tags = $this->tagService->all()->pluck('name','id');
        $postTags = $post->tags;
        $categories = $this->categoryService->all();

        return view('admin.posts.edit',compact('post','tags','postTags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,$id)
    {
        //
        $post = $this->postService->getId($id);
        $this->authorize('update',$post);
        if($post){
            Storage::delete('public/storage/'.$post->image);
            $this->postService->update($request,$id);
            $tags = $request->tags;
            $post->tags()->sync($tags);
            Toastr::success('The post updated successfully :)','Success');

            return redirect()->route('admin.posts.index')->withSuccess(ucwords($post->title." ".'Post updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->postService->getId($id);
        $this->authorize('delete',$post);
        if($post){
            Storage::delete('public/storage/'.$post->image);
            $this->postService->delete($id);
            $post->tags()->detach();
            Toastr::success('The post deleted successfully :)','Success');
            
            return redirect()->route('admin.posts.index')->withSuccess(ucwords($post->title." ".'Post deleted successfully'));
        }
    }
}
