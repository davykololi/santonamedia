<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\Superadmin;

class SuperadminChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:superadmin');
    }

    /**
     * Show the teacher change password form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin.change_password');
    }

    public function store(Request $request)
    {
    	$request->validate([
    				'current_password' => ['required', new MatchOldPassword],
    				'new_password' => ['required'],
    				'new_confirm_password' => ['same:new_password'],
    			]);

  			Superadmin::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

  		return back()->withSuccess('The password changed successfuly!');
    }
}
