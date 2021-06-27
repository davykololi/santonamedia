@extends('layouts.superadmin')
@section('title', '| Superadmin Add Post')

@section('content')
<main role="main" class="container" id="main">
<div class="row" id="lightblue">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="titles">NEW ARTICLE</h3> 
                <a href="{!! route('superadmin.posts.index') !!}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{!! route('superadmin.posts.store') !!}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._create_authordiv')
                    @include('ext._create_titlediv')
                    @include('ext._create_imagediv')
                    @include('ext._creatediv')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
