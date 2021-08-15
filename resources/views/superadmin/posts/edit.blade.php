@extends('layouts.superadmin')
@section('title', '| Superadmin Edit Post')

@section('content')
<main role="main" class="container" id="main">
<div class="row" id="lightblue">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="titles"> EDIT AN ARTICLE </h3>
                    <a href="{!! route('superadmin.posts.index') !!}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{!! route('superadmin.posts.update',$post->id) !!}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._method_put')
                    @include('ext._postedit_authordiv')
                    @include('ext._postedit_titlediv')
                    @include('ext._create_imagediv')
                    @include('ext._posteditdiv')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
