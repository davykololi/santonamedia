<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Models\User;
use Spatie\SchemaOrg\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    //
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
    	$user = Auth::user();
        $user_name = $user->name;
        $user_email = $user->email;
        $url = URL::current();
        $comments_count = $user->comments->count();

        $profile = Schema::ProfilePage()
                ->name($user_name)
                ->email($user_email)
                ->url($url)
                ->sameAS("http://www.santonamedia.com")
                ->logo("https://santonamedia.com/static/logo.jpg");
        echo $profile->toScript();

    	return view('user.profile.profile',compact('user','comments_count'));
    }

    public function update_avatar(Request $request)
    {
    	$request->validate([
    					'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    					]);
    	$user = Auth::user();
    	$avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

    	$request->avatar->storeAs('avatars',$avatarName);

        if($user){
        Storage::delete('avatars/{!! $user->avatar !!}');
        $user->avatar = $avatarName;
        $user->save();

    	return back()->withSuccess('You have successfully uploaded the image');
        }
    }
}
