<?php

namespace App\Http\Controllers\Admin;

use Image;
use File;
use Youtube;
use App\Events\VideoCreated;
use App\Models\Video;
use App\Services\TagService;
use App\Services\VideoService;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\VideoFormRequest as AdminRequest;

class VideoController extends Controller
{
    protected $videoService;
    protected $categoryService;
    protected $tagService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VideoService $videoService,CategoryService $categoryService,TagService $tagService)
    {
        $this->middleware('auth:admin');
        $this->videoService = $videoService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function youtubeVideoUpload(Video $video)
    {
        //
        $fullPathToVideo = storage_path('app/public/$video->video');
        $youtubeVideo = Youtube::upload($fullPathToVideo,[
            'title' => $video->title,
            'description' => $video->description,
            'tags' => $video->tags,
            'category_id' => $video->category->id,
        ]);

        return $youtubeVideo->getVideoId();
    }

    public function youtubeVideoUpdate(Video $video)
    {
        //
        $videoId = Youtube::getVideoId();
        $youtubeVideo = Youtube::update($videoId,[
            'title' => $video->title,
            'description' => $video->description,
            'tags' => $video->tags,
            'category_id' => $video->category->id,
        ]);

        return $youtubeVideo->getVideoId();
    }

    public function index()
    {
        //
        $videos = $this->videoService->authVideos();
        
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
        $tags = $this->tagService->all()->pluck('name','id');
        $categories = $this->categoryService->all();

        return view('admin.videos.create',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $video = $this->videoService->create($request);
        $tags = $request->tags;
        $video->tags()->sync($tags);
        $this->youtubeVideoUpload($video);
        Toastr::success('The video created successfully :)','Success');
        event(new VideoCreated($video));

        return redirect()->route('admin.videos.index')->withSuccess(ucwords($video->title." ".'created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $video = $this->videoService->getId($id);

        return view('admin.videos.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $video = $this->videoService->getId($id);
        $tags = $this->tagService->all()->pluck('name','id');
        $categories = $this->categoryService->all();
        $videoTags = $video->tags;

        return view('admin.videos.edit',compact('video','tags','videoTags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request,$id)
    {
        $video = $this->videoService->getId($id);
        $this->authorize('update',$video);
        if($video){
            Storage::delete('public/videos/'.$video->video);
            $this->videoService->update($request,$id);
            $tags = $request->tags;
            $video->tags()->sync($tags);
            $this->youtubeVideoUpdate($video);
            Toastr::success('The video updated successfully :)','Success');

            return redirect()->route('admin.videos.index')->withSuccess(ucwords($video->title." ".'updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $video = $this->videoService->getId($id);
        $this->authorize('delete',$video);
        if($video){
            Storage::delete('public/videos/'.$video->video);
            $this->videoService->delete($id);
            $video->tags()->detach();
            $videoId = Youtube::getVideoId();
            Youtube::delete($videoId);
            Toastr::success('The video deleted successfully :)','Success');

            return redirect()->route('admin.videos.index')->withSuccess(ucwords($video->title." ".'deleted successfully'));
        }
    }
}
