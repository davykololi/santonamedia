<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TagFormRequest as StoreRequest;
use App\Http\Requests\TagFormRequest as UpdateRequest;

class TagController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::all();

        return view('admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
        $input = $request->all();
        $tag = Tag::create($input);

        return redirect()->route('admin.tags.index')->withSuccess('The tag created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
        return view('admin.tags.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
        return view('admin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Tag $tag)
    {
        //
        $input = $request->all();
        $tag->update($input);

        return redirect()->route('admin.tags.index')->withSuccess('The tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    	if(!$tag->posts->isEmpty()){
    		return redirect()->route('admin.tags.index')->withErrors(__('This Tag has articles attached and can\'t be deleted.'));
    	}

        $tag->delete();

        return redirect()->route('admin.tags.index')->withSuccess('The tag deleted successfully');
    }
}
