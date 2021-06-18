<?php

namespace App\Http\Controllers\Superadmin;

use Image;
use File;
use Youtube;
use App\Models\Video;
use App\Services\TagService;
use App\Services\VideoService;
use App\Services\CategoryService;
use App\Services\AdminService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\VideoFormRequest as StoreRequest;
use App\Http\Requests\VideoFormRequest as UpdateRequest;
use Brian2694\Toastr\Facades\Toastr;

class VideoController extends Controller
{
    protected $videoService;
    protected $categoryService;
    protected $tagService;
    protected $adminService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VideoService $videoService,CategoryService $categoryService,TagService $tagService,AdminService $adminService)
    {
        $this->middleware('auth:superadmin');
        $this->videoService = $videoService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
        $this->adminService = $adminService;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $videos = $this->videoService->all();

        return view('superadmin.videos.index',compact('videos'));
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
        $admins = $this->adminService->all();

        return view('superadmin.videos.create',compact('tags','categories','admins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $video = $this->videoService->superadminCreate($request);
        $tags = $request->tags;
        $video->tags()->sync($tags);
        $this->youtubeVideoUpload($video);
        Toastr::success('The video created successfully :)','Success');

        return redirect()->route('superadmin.videos.index')->withSuccess(ucwords($video->title." ".'created successfully'));
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

        return view('superadmin.videos.show',['video'=>$video]);
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
        $admins = $this->adminService->all();
        $videoTags = $video->tags;

        return view('superadmin.videos.edit',compact('video','tags','videoTags','categories','admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,$id)
    {
        $video = $this->videoService->getId($id);
        if($video){
            Storage::delete('public/videos/'.$video->video);
            $this->videoService->superadminUpdate($request,$id);
            $tags = $request->tags;
            $video->tags()->sync($tags);
            $this->youtubeVideoUpdate($video);
            Toastr::success('The video updated successfully :)','Success');

            return redirect()->route('superadmin.videos.index')->withSuccess(ucwords($video->title." ".'updated successfully'));
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
        if($video){
            Storage::delete('public/videos/'.$video->video);
            $this->videoService->delete($id);
            $video->tags()->detach();
            $videoId = Youtube::getVideoId();
            Youtube::delete($videoId);
            Toastr::success('The video deleted successfully :)','Success');

            return redirect()->route('superadmin.videos.index')->withSuccess(ucwords($video->title." ".'deleted successfully'));
        }
    }
}
