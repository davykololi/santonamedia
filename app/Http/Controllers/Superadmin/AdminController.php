<?php

namespace App\Http\Controllers\Superadmin;

use Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Services\AdminService;

class AdminController extends Controller
{
    protected $adminService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminService $adminService)
    {
        $this->middleware('auth:superadmin');
        $this->adminService = $adminService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = $this->adminService->all();

        return view('superadmin.admins.index',['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = $this->adminService->create($request);
        Toastr::success('The admin created successfully :)','Success');

        return redirect()->route('superadmin.admins.index')->withSuccess(ucwords($admin->name." ".'info created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $admin = $this->adminService->getId($id);

        return view('superadmin.admins.show',['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $admin = $this->adminService->getId($id);

        return view('superadmin.admins.edit',['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $admin = $this->adminService->getId($id);
        if($admin){
            Storage::delete('public/storage/'.$admin->image);
            $this->adminService->update($request,$id);
            Toastr::success('The admin updated successfully :)','Success');

            return redirect()->route('superadmin.admins.index')->withSuccess(ucwords($admin->name." ".'info updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = $this->adminService->getId($id);
        if($admin){
            Storage::delete('public/storage/'.$admin->image);
            $this->adminService->delete($id);
            Toastr::success('The admin deleted successfully :)','Success');

            return redirect()->route('superadmin.admins.index')->withSuccess(ucwords($admin->name." ".'info deleted successfully'));
        }
    }
}
