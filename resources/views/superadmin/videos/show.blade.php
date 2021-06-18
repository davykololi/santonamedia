@extends('layouts.superadmin')
@section('title', '| Superadmin Show Video')

@section('content')
<main role="main" class="container" id="main">
<div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h3 class="titles">VIDEO DETAILS</h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{!! route('superadmin.videos.index') !!}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h1 id="fb" class="textupper"> {!! $video->title !!} </h1>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {!! date("F j,Y,g:i a",strtotime($video->created_at)) !!} By: 
                <span style="color: red">{!! $video->admin->name !!}</span>.
            </span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <video width="320" height="240" controls> 
                <source type="video/mp4" src="{!! $video->videoUrl() !!}">
                    This browser doesn't support video tag.
            </video>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! $video->caption !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {!! $video->description !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Content:</strong>
            {!! $video->content !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Key Words:</strong>
            {!! $video->keywords !!}
        </div>
    </div>
</div>
</main>
@endsection
