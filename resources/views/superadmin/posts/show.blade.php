@extends('layouts.superadmin')
@section('title', '| Superadmin Show Post')

@section('content')
<main role="main" class="container" id="main">
<div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h3 class="titles">POST DETAILS</h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{!! route('posts.index') !!}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h1 id="fb"> {!! $post->title !!} </h1>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {!! date("F j,Y,g:i a",strtotime($post->created_at)) !!} 
                By:<span style="color: red"> {!! $post->admin->name !!} </span>
            </span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style = "width:25%" src="{!! $post->imageUrl() !!}" alt="{!! $post->title !!}"/>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {!! $post->description !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! $post->caption !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Content:</strong>
            {!! $post->content !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Key Words:</strong>
            {!! $post->keywords !!}
        </div>
    </div>
</div>
</main>
@endsection
