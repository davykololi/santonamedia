<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimeframeDataController extends Controller
{
    //
    public function sevendaysData()
    {
    	$start_date = Carbon::now()->subdays(7)->toDateTimeString();
    	$end_date = Carbon::now()->toDateTimeString();

    	$data = Post::whereBetween('updated_at',[$start_date,$end_date]);

    	return view('user.dataduration.seven_days_posts',compact('data'));
    }
}
