@extends('layouts.superadmin')
@section('title', '| Show Admin')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>ADMIN DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('superadmin.admins.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
    </div>
    @include('partials.messages')
    @include('partials.errors')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
           {{ $admin->title }} {{ $admin->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style="width: 15%" src="{!! $admin->imageUrl() !!}" alt="{!! $admin->name !!}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $admin->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone:</strong>
            {{ $admin->phone_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Area Served:</strong>
            {{ $admin->area }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Articles:</strong>
           <label class="label label-info">{{ $admin->posts->count() }}</label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Keywords:</strong>
            {{ $admin->keywords }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($admin->created_at)) }}</span>
        </div>
    </div>
</div>
</main>
@endsection
