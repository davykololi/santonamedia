<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\Admin;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBannController extends Controller
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

    public function ban(Request $request,Admin $admin)
    {
    	$input['banned_at'] = Carbon::now();
    	$admin->ban([
    		'comment' => 'You have been banned by the adminitrator',
    	]);
    	$admin->update($input);

    	return back()->withSuccess('The user banned successfully');
    }

    public function revoke(Admin $admin)
    {
    	if(!empty($admin)){
    		$admin->unban();

    		return back()->withSuccess('The bann revoked successfully');
    	}
            return back()->withErrors('There was an error in revoking the ban. Try again!');
    }
}
