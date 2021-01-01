<?php

namespace App\Http\Controllers\Admin;

use Image;
use File;
use Auth;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\VideoFormRequest as StoreRequest;
use App\Http\Requests\VideoFormRequest as UpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
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
        $videos = auth()->user()->videos()->latest()->get();

        return view('admin.videos.index',compact('videos'));
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

        return view('admin.videos.create',compact('tags','categories'));
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
        if($request->hasfile('video')){
        //Get filename with extention
        $filenameWithExt = $request->file('video')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('video')->getClientOriginalExtension();
        //File to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload Image
        $path = $request->file('video')->storeAs('public/videos',$fileNameToStore);
        } else{
        $fileNameToStore = 'novideo.mp4';
        }

        $input = $request->all();
        $input['video'] = $fileNameToStore;
        $input['admin_id'] = Auth::id();
        $input['category_id'] = $request->category;
        $video = Video::create($input);
        $tags = $request->tags;
        $video->tags()->sync($tags);

        return redirect()->route('admin.videos.index')->withSuccess('The video created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
        return view('admin.videos.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
        $tags = Tag::get()->pluck('name','id');
        $videoTags = $video->tags;
        $categories = Category::all();

        return view('admin.videos.edit',compact('video','tags','videoTags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Video $video)
    {
        $this->authorize('update',$video);
        //Handle the file upload
        if($request->hasfile('video')){
        //Get filename with extention
        $filenameWithExt = $request->file('video')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('video')->getClientOriginalExtension();
        //File to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload Image
        $path = $request->file('video')->storeAs('public/videos',$fileNameToStore);
        } else{
        $fileNameToStore = 'novideo.mp4';
        }

        if($video){
        Storage::delete('public/videos/'.$video->video);
        $input = $request->all();
        $input['video'] = $fileNameToStore;
        $input['admin_id'] = Auth::id();
        $input['category_id'] = $request->category;
        $input['is_published']  = $request->has('publish');

        $video->update($input);
        $tags = $request->tags;
        $video->tags()->sync($tags);

        return redirect()->route('admin.videos.index')->withSuccess('The video updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
        $this->authorize('delete',$video);
        if($video){
            Storage::delete('public/videos/'.$video->video);
            $video->delete();
            $video->tags()->detach();

        return redirect()->route('admin.videos.index')->withSuccess('The video deleted successfully');
        }
    }
}
