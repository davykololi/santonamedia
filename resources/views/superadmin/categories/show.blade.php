@extends('layouts.superadmin')
@section('title', '| Category Details')

@section('content')
<main role="main" class="container" id="main">
<br/>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3 class="titles">CATEGORY DETAILS</h3>
        </div>
        <div class="pull-right">
            <a href="{!! route('superadmin.categories.index') !!}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! $category->name !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {!! $category->description !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Key Words:</strong>
            {!! $category->keywords !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Published On:</strong>
            {!! $category->created_at !!}
        </div>
    </div>
</div>
</main>
@endsection
