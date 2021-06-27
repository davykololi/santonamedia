<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\CategoryFormRequest as StoreRequest;
use App\Http\Requests\CategoryFormRequest as UpdateRequest;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    protected $categoryService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('auth:superadmin');
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = $this->categoryService->all();

        return view('superadmin.categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.categories.create');
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
        $category = $this->categoryService->create($request);
        Toastr::success('The category created successfully :)','Success');
        
        return redirect()->route('superadmin.categories.index')->withSuccess(ucwords($category->name." ".'Category created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = $this->categoryService->getId($id);

        return view('superadmin.categories.show',['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = $this->categoryService->getId($id);

        return view('superadmin.categories.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $category = $this->categoryService->getId($id);
        $this->categoryService->update($request,$id);
        Toastr::success('The category updated successfully :)','Success');

        return redirect()->route('superadmin.categories.index')->withSuccess(ucwords($category->name." ".'Category updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = $this->categoryService->getId($id);
        $this->categoryService->delete($id);
        Toastr::success('The category deleted successfully :)','Success');

        return redirect()->route('superadmin.categories.index')->withSuccess(ucwords($category->name." ".'Category deleted successfully'));
    }
}
