<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function AuthRouteAPI(Request $request)
    {
    	return $request->user();
    }
}
