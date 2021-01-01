<?php

namespace App\Http\Controllers\Admin;

use Image;
use File;
use Auth;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostFormRequest as StoreRequest;
use App\Http\Requests\PostFormRequest as UpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = auth()->user()->posts()->latest()->get();

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
        $tags = Tag::get()->pluck('name','id');
        $categories = Category::all();

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
        //Handle the file upload
        if($request->hasfile('image')){
        //Get filename with extention
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        //File to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload Image
        $path = $request->file('image')->storeAs('public/storage',$fileNameToStore);
        } else{
        $fileNameToStore = 'noimage.jpg';
        }

        $input = $request->all();
        $input['image'] = $fileNameToStore;
        $input['admin_id'] = Auth::id();
        $input['category_id'] = $request->category;
        $post= Post::create($input);
        $tags = $request->tags;
        $post->tags()->sync($tags);

        return redirect()->route('admin.posts.index')->withSuccess('The post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('admin.posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $tags = Tag::get()->pluck('name','id');
        $postTags = $post->tags;
        $categories = Category::all();

        return view('admin.posts.edit',['post'=>$post,'categories'=>$categories,'tags'=>$tags,'postTags'=>$postTags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Post $post)
    {
        //
        $this->authorize('update',$post);
        //Handle the file upload
        if($request->hasfile('image')){
        //Get filename with extention
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        //File to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload Image
        $path = $request->file('image')->storeAs('public/storage',$fileNameToStore);
        } else{
        $fileNameToStore = 'noimage.jpg';
        }

        if($post){
            Storage::delete('public/storage/'.$post->image);
            $input = $request->all();
            $input['image'] = $fileNameToStore;
            $input['admin_id'] = Auth::id();
            $input['category_id'] = $request->category;
            $input['is_published']  = $request->has('publish');
            $post->update($input);
            $tags = $request->tags;
            $post->tags()->sync($tags);

        return redirect()->route('admin.posts.index')->withSuccess('The post updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $this->authorize('delete',$post);
        if($post){
            Storage::delete('public/storage/'.$post->image);
            $post->delete();
            $post->tags()->detach();
            
        return redirect()->route('admin.posts.index')->withSuccess('The post deleted successfully');
        }
    }
}
