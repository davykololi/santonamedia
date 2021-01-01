<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImpersonateController extends Controller
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

    public function impersonate($admin_id)
    {
        if($admin_id != ''){
            $admin = Admin::find($admin_id);
            Auth::user()->impersonate($admin);

            return redirect('/admin/dashboard');
        }
        return redirect()->back();
    }

    public function impersonate_leave()
    {
        Auth::user()->leaveImpersonation();

        return redirect('/superadmin');
    }
}
