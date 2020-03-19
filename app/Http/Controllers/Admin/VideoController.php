<?php

namespace App\Http\Controllers\Admin;

use Image;
use File;
use Auth;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Video;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\VideoFormRequest as StoreRequest;
use App\Http\Requests\VideoFormRequest as UpdateRequest;

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
        $videos = Video::latest()->get();

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
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
        $tags = Tag::get()->pluck('name','id');
        $categories = Category::all();

        return view('admin.videos.edit',compact('video','tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Video $video)
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


        if($video){
        Storage::delete('public/videos/'.$video->video);
        $input = $request->all();
        $input['video'] = $fileNameToStore;
        $input['admin_id'] = Auth::id();
        $input['category_id'] = $request->category;

        $video->update($input);
        $tags = $request->tags;
        $video->tags()->sync($tags);

        return redirect()->route('admin.videos.index')->withSuccess('The video updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        if($video){
            Storage::delete('public/videos/'.$video->video);
            $video->delete();

        return redirect()->route('admin.videos.index')->withSuccess('The video deleted successfully');
    }
}
}
