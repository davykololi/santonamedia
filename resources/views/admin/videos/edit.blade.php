@extends('layouts.adminmaster')
@section('title', '| Edit Video')

@section('content')
<main role="main" class="container" id="main">
<div class="row" id="lightblue">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="titles"> EDIT A VIDEO</h3>
                    <a href="{!! route('admin.videos.index') !!}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{!! route('admin.videos.update', $video->id) !!}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._videoedit_titlediv')
                    @include('ext._videoedit_videodiv')
                    @include('ext._videoeditdiv')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
