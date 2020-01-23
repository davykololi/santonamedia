<?php

namespace App\Http\Controllers\User;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function profile()
    {
    	$user = Auth::user();

    	return view('user.profile.profile',compact('user',$user));
    }

    public function update_avatar(Request $request)
    {
    	$request->validate([
    					'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    					]);
    	$user = Auth::user();
    	$avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

    	$request->avatar->storeAs('avatars',$avatarName);

    	$user->avatar = $avatarName;
    	$user->save();

    	return back()->withSuccess('You have successfully uploaded the image');
    }
}
