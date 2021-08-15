<?php

namespace App\Http\Controllers\Superadmin;

use App\Repositories\AdminRepository as AdminRepo;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBannController extends Controller
{
    protected $adminRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepo $adminRepo)
    {
        $this->middleware('auth:superadmin');
        $this->adminRepo = $adminRepo;
    }

    public function ban(Request $request, $id)
    {
        $admin = $this->adminRepo->getId($id);
        $input['banned_at'] = Carbon::now();
        $admin->ban([
            'comment' => 'You have been banned by the adminitrator',
        ]);
        $admin->update($input);

        return back()->withSuccess('The user banned successfully');
    }

    public function revoke($id)
    {
        $admin = $this->adminRepo->getId($id);
        if(!empty($admin)){
            $admin->unban();

            return back()->withSuccess('The bann revoked successfully');
        }
            return back()->withErrors('There was an error in revoking the ban. Try again!');
    }
}
