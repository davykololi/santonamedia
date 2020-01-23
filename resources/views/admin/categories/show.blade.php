@extends('layouts.adminmaster')
@section('title', '| Category Details')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>CATEGORY DETAILS</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.categories.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $category->name }}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {{ $category->description }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Published On:</strong>
            {{ $category->created_at }}
        </div>
    </div>
</div>
</main>
@endsection