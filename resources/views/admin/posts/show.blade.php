@extends('layouts.adminmaster')
@section('title', '| Show Post')

@section('content')
<main role="main" class="container" id="main">
<div class="container">
    <div class="row">
        <div class="col-md-12 margin-tb">
            <div class="pull-left">
                <h3 class="titles">POST DETAILS</h3>
                <br/>
            </div>
            <div class="pull-right">
                <a href="{!! route('admin.posts.index') !!}" class="label label-primary pull-right">Back</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @include('ext._postshowdiv')
    </div>
</div>
</main>
@endsection
