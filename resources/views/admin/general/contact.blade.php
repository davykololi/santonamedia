@extends('layouts.adminmaster')
@section('title', '| Contact Details')

@section('content')
<main role="main" class="container" id="main">
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 id="fb">CONTACT DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{!! route('contactus.contacts') !!}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! $contact->name !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! $contact->email !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Message:</strong>
            {!! $contact->message !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {!! date("F j,Y,g:i a",strtotime($contact->created_at)) !!}</span>
        </div>
    </div>
</div>
</main>
@endsection
