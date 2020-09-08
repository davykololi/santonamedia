<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use Image;
use App\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = Admin::get();
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
        //Handle the file upload
        if($request->hasfile('image')){
        //Get filename with extention
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        //File to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload Image
        $path = $request->file('image')->storeAs('public/storage',$fileNameToStore);
        } else{
        $fileNameToStore = 'noimage.jpg';
        }

        $input = $request->all();
        $input['image'] = $fileNameToStore;
        $input['password'] = Hash::make($request->password);
        $input['superadmin_id'] = Auth::user()->id;
        $admin = Admin::create($input);

        return redirect()->route('admins.index')->with('success','The admin created successfully');
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
        $admin = Admin::findOrFail($id);
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
        $admin = Admin::findOrFail($id);
        return view('superadmin.admins.edit',['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $admin = Admin::findOrFail($id);

        //Handle the file upload
        if($request->hasfile('image')){
        //Get filename with extention
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        //File to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload Image
        $path = $request->file('image')->storeAs('public/storage',$fileNameToStore);
        } else{
        $fileNameToStore = 'noimage.jpg';
        }

        if($admin){
            Storage::delete('public/storage/'.$admin->image);
            $input = $request->all();
            $input['image'] = $fileNameToStore;
            $admin->update($input);

            return redirect()->route('admins.index')->with('success','The admin updated successfully');
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
        //
        $admin = Admin::findOrFail($id);

        if($admin){
            Storage::delete('public/storage/'.$admin->image);
            $admin->delete();

            return redirect()->route('admins.index')->with('success','The admin deleted successfully');
        }
    }
}
