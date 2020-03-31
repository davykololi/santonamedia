@extends('layouts.app')
@section('title', '| Contact Us')

@section('content')
<main role="main" class="container" id="main">
<br/>
<div class="row justify-content-center">
<div class="col-md-9" style="background-color: lightgray;border-radius: 25px" id="double">
@include('partials.messages')
@include('partials.errors')
<br/>
<h3 class="center title blue">CONTACT FORM</h3>
<p class="center" style="font-size: 15px;">
We are so glad that you are contacting us.Fill the form below and submit to us. 
</p>
 
{!! Form::open(['route'=>'contactus.store']) !!}
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
{!! Form::label('Name:') !!}
{!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Your Name']) !!}
<span class="text-danger">{{ $errors->first('name') }}</span>
</div>
 
<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
{!! Form::label('Email:') !!}
{!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Your Email Address']) !!}
<span class="text-danger">{{ $errors->first('email') }}</span>
</div>
 
<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
{!! Form::label('Message:') !!}
{!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}
<span class="text-danger">{{ $errors->first('message') }}</span>
</div>
 
<div class="form-group">
<button class="btn btn" id="button" value="submit">Submit</button>
</div>
{!! Form::close() !!}
</div>
</div>
<br/>
</main>
@endsection
