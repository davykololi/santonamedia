<?php

namespace App\Http\Controllers\Admin;

use Image;
use File;
use App\Events\PostCreated;
use App\Services\TagService;
use App\Services\PostService;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
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
        try{
            DB::beginTransaction();
            $post = $this->postService->create($request);
            if(!$post){
                DB::rollBack();
                return back()->with('error','Something went wrong while saving. Please try again');
            }

            DB::commit();
            $tags = $request->tags;
            $post->tags()->sync($tags);
            Toastr::success('The post created successfully :)','Success');
            event(new PostCreated($post));

            return redirect()->route('admin.posts.index')->withSuccess(ucwords($post->title." ".'Post created successfully'));
        } catch(\Throwable $th){
            DB::rollBack();
            throw $th;
        }
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
        if(!$post){
            return back()->with('error','Article Not Found');
        }

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
        if(!$post){
            return back()->with('error','Article Not Found');
        }

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
        try{
            DB::beginTransaction();

            $post = $this->postService->getId($id);
            if(!$post){
                DB::rollBack();

                return back()->with('error','Something went wrong while updating data. Please try again');
            }
            DB::commit();
            Storage::delete('public/storage/'.$post->image);
            $this->postService->update($request,$id);
            $tags = $request->tags;
            $post->tags()->sync($tags);
            Toastr::success('The post updated successfully :)','Success');

            return redirect()->route('admin.posts.index')->withSuccess(ucwords($post->title." ".'Post updated successfully'));
        } catch (\Throwable $th){
            DB::rollBack();
            throw $th;
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
        try{
            DB::beginTransaction();

            $post = $this->postService->getId($id);
            if(!$post){
                DB::rollBack();
                return back()->with('error','An error occured while deleting the article. Please try again later!');
            }
            
            DB::commit();
            Storage::delete('public/storage/'.$post->image);
            $this->postService->delete($id);
            $post->tags()->detach();
            Toastr::success('The post deleted successfully :)','Success');
            
            return redirect()->route('admin.posts.index')->withSuccess(ucwords($post->title." ".'Post deleted successfully'));

        } catch(\Throwable $th){
            DB::rollBack();
            throw $th;
        }
    }
}
