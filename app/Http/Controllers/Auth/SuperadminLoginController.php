<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperadminLoginController extends Controller
{
    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('guest:superadmin',['except' => ['logout']]);
    }
 
    //function to show admin login form
    public function showLoginForm() {
        return view('auth.superadmin-login');
    }
    //function to login admins
    public function login(Request $request) {
        //validate the form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //attempt to login the admins in
        if (Auth::guard('superadmin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            //if successful redirect to admin dashboard
            return redirect()->intended(route('superadmin.dashboard'));
        }
        //if unsuccessfull redirect back to the login for with form data
        return redirect()->back()->withInput($request->only('email','remember'));
    }
 
    public function logout()
    {
        Auth::guard('superadmin')->logout();
 
        return redirect('/');
    }

}
