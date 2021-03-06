@extends('layouts.superadmin')
@section('title', '| Superadmin Edit Post')

@section('content')
<main role="main" class="container" id="main">
<div class="row" id="lightblue">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="titles"> EDIT AN ARTICLE </h3>
                    <a href="{!! route('posts.index') !!}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{!! route('posts.update', $post->id) !!}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" value="{!! $post->title !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Images</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" class="form-control" value="{!! $post->image !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="caption" id="caption" class="form-control" value="{!! $post->caption !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Category</label>
                        <div class="col-md-10">
                            <select id="category" type="category" class="form-control" name="category">
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{!! $category->id !!}" @if($post->category_id == $category->id) selected @endif>
                                        {!! $category->name !!}
                                    </option>
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
                        <label class="control-label col-sm-2">Author</label>
                        <div class="col-md-10">
                            <select id="admin" type="admin" class="form-control" name="admin">
                                <option value="">Select Author</option>
                                @foreach ($admins as $admin)
                                    <option value="{!! $admin->id !!}" @if($post->admin_id == $admin->id) selected @endif>
                                        {!! $admin->name !!}
                                    </option>
                                @endforeach
                            </select>

                            @if($errors->has('admin'))
                                <span class="help-block">
                                    <strong>{!! $errors->first('admin') !!}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" class="form-control">{!! $post->description !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Content</label>
                        <div class="col-sm-10">
                            <textarea name="content" rows="5" cols="40" class="form-control" id="summary-ckeditor">
                                {!! $post->content !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Key Words</label>
                        <div class="col-sm-10">
                            <textarea name="keywords" id="keywords" class="form-control">{!! $post->keywords !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Tags</label>
                        <div class="col-sm-10">
                            {!! Form::select('tags[]',$tags,$postTags,['class'=>'form-control','multiple'=>'multiple']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox col-sm-offset-2 col-sm-10">
                            <input type="checkbox" class="custom-control-input" name="publish" id="publish-post" @if($post->is_published) checked @endif>
                            <label class="custom-control-label" for="publish-post">Publish</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" value="Update" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
