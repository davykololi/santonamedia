<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class ForbidBannedAdminCustom
{
	protected $auth;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
    	$admin = $this->auth->user();

    	if($admin && $admin->isBanned()){
    		\Session::flush();
    		return redirect('/')->withInput()->withErrors([
    			'email' => 'This account is blocked!. Contact the administrator!!!',
    		]);
    	}
        return $next($request);
    }
}
