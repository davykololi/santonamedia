@extends('layouts.superadmin')
@section('title', '| Superadmin Edit Video')

@section('content')
<main role="main" class="container" id="main">
<div class="row" id="lightblue">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="titles"> EDIT A VIDEO</h3>
                    <a href="{!! route('superadmin.videos.index') !!}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{!! route('superadmin.videos.update', $video->id) !!}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._method_put')
                    @include('ext._videoedit_authordiv')
                    @include('ext._videoedit_titlediv')
                    @include('ext._create_videodiv')
                    @include('ext._videoeditdiv')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
