<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //
    public function getData()
    {
    	$previous_week = strtotime("-1 week +1 day");
    	$start_week = strtotime("last sunday midnight",$previous_week);
    	$end_week = strtotime("next saturday",$start_week);
    	$start_week = date("Y-m-d",$start_week);
    	$end_week = date("Y-m-d",$end_week);

    	$posts = Post::where('created_at',[$start_week,$end_week])->get();

    	return view('user.posts.week','posts' => $posts);
    }
}
