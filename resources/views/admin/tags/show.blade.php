@extends('layouts.adminmaster')
@section('title', '| Show Tag')

@section('content')
<main role="main" class="container" id="main">
    <br/>
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h3 class="titles">TAG DETAILS</h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.tags.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h1 id="fb"> {{ $tag->name }} </h1>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong> Description:</strong> <span id="fb"> {{ $tag->desc }} </span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong> Keywords:</strong> <span id="fb"> {{ $tag->keywords }} </span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($tag->created_at)) }}
            </span>
        </div>
    </div>
</div>
</main>
@endsection
