@extends('layouts.adminmaster')
@section('title', '| Add Video')

@section('content')
<main role="main" class="container" id="main">
<div class="row" id="lightblue">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="titles">NEW VIDEO</h3> 
                <a href="{!! route('admin.videos.index') !!}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{!! route('admin.videos.store') !!}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._create_titlediv')
                    @include('ext._create_videodiv')
                    @include('ext._creatediv')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
