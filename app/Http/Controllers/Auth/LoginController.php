<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        Session::put('preUrl',URL::previous());
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo()
    {
    	return Session::get('preUrl') ? Session::get('preUrl') : $this->redirectTo;
    }
}
