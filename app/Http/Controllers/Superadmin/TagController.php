<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TagService;
use App\Http\Requests\TagFormRequest as StoreRequest;
use App\Http\Requests\TagFormRequest as UpdateRequest;
use Brian2694\Toastr\Facades\Toastr;

class TagController extends Controller
{
    protected $tagService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TagService $tagService)
    {
        $this->middleware('auth:superadmin');
        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = $this->tagService->all();

        return view('superadmin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.tags.create');
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
        $tag =$this->tagService->create($request);
        Toastr::success('The tag created successfully :)','Success');

        return redirect()->route('superadmin.tags.index')->withSuccess(ucwords($tag->name." ".'Tag created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tag = $this->tagService->getId($id);

        return view('superadmin.tags.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tag = $this->tagService->getId($id);

        return view('superadmin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,$id)
    {
        //
        $tag = $this->tagService->getId($id);
        $this->tagService->update($request,$id);
        Toastr::success('The tag updated successfully :)','Success');

        return redirect()->route('superadmin.tags.index')->withSuccess(ucwords($tag->name." ".'Tag updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tag = $this->tagService->getId($id);
        if(!$tag->posts->isEmpty()){
            return redirect()->route('superadmin.tags.index')->withErrors(__('This Tag has articles attached and can\'t be deleted.'));
        }
        $tag->posts()->detach();
        $this->tagService->delete($id);
        Toastr::success('The tag deleted successfully :)','Success');

        return redirect()->route('superadmin.tags.index')->withSuccess(ucwords($tag->name." ".'Tag deleted successfully'));
    }
}
