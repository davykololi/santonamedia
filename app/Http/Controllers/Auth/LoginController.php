<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
    * Login username to be used by the controller.
    *
    *@var string
    */
    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout','userlogout');
        Session::put('preUrl',URL::previous());
        $this->username = $this->findUsername();
    }

    public function userlogout()
    {
        Auth::guard('web')->logout();
 
        return redirect('/');
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

    public function findUsername()
    {
        $login = request()->input('login');
        $fieldType = filter_var($login,FILTER_VALIDATE_EMAIL) ? 'email':'username';

        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    public function username()
    {
        return $this->username;
    }
        
}
