@extends('layouts.adminmaster')
@section('title', '| Add Post')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<br/>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="titles">NEW ARTICLE</h3> 
                <a href="{{ route('admin.posts.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('admin.posts.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Post title here">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Images</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="caption" id="caption" class="form-control" placeholder="Name or Tile of your image.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Category</label>
                        <div class="col-md-10">
                            <select id="category" type="category" class="form-control" name="category">
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('category'))
                                <span class="help-block">
                                    <strong>{{$errors->first('category')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" id="description" class="form-control" placeholder="Describe your content here in less than 20 words.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Content</label>
                        <div class="col-sm-10">
                            <textarea name="content" id="content" class="form-control" placeholder="Write your content here."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn" id="button" value="Add Post" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
