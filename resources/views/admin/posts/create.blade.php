@extends('layouts.adminmaster')
@section('title', '| Add Post')

@section('content')
<main role="main" class="container" id="main">
<br/>
<div class="row" id="lightblue">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="titles">NEW ARTICLE</h3> 
                <a href="{!! route('admin.posts.index') !!}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{!! route('admin.posts.store') !!}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" value="{!! old('title') !!}" class="form-control" placeholder="Post title here">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Images</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" value="{!! old('image') !!}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="caption" id="caption" value="{!! old('caption') !!}" class="form-control" placeholder="Name or Title of your image.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Summary</label>
                        <div class="col-sm-10">
                            <input type="text" name="summary" id="summary" value="{!! old('summary') !!}" class="form-control" placeholder="Article Summary.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Category</label>
                        <div class="col-md-10">
                            <select id="category" type="category" value="{!! old('category') !!}" class="form-control" name="category">
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                            <option value="{!! $category->id !!}">{!! $category->name !!}</option>
                                @endforeach
                            </select>

                            @if($errors->has('category'))
                                <span class="help-block">
                                    <strong>{!! $errors->first('category') !!}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" id="description" value="{!! old('description') !!}" class="form-control" placeholder="Describe your content here in less than 20 words.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Content</label>
                        <div class="col-sm-10">
                            <textarea name="content" rows="5" cols="40" value="{!! old('content') !!}" id="summary-ckeditor"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Key Words</label>
                        <div class="col-sm-10">
                            <input type="text" name="keywords" id="keywords" value="{!! old('keywords') !!}" class="form-control" placeholder="Enter your keywords separated by commas.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Tags</label>
                        <div class="col-sm-10">
                            {!! Form::select('tags[]',$tags,old('tags'),['class'=>'form-control','multiple'=>'multiple']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" value="Add Post" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
