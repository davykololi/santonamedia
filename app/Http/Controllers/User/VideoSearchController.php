<?php

namespace App\Http\Controllers\User;

use App\Models\Video;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoSearchController extends Controller
{
    //
    public function index(Request $request)
    {
    	if($request->has('search')){
    		$videos = Video::search($request->search)->limit(5)->get();
    	} else {
    		$videos = Video::limit(5)->get();
    	}

    	return view('user.videos.index',compact('videos'));
    }
}
