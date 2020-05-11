@extends('layouts.app')
@section('title', '| Contact Us')

@section('content')
<div class="wrap">
    <div id="main-content">
    	<div class="pd10">
		@include('partials.messages')
		@include('partials.errors')
			<h3 class="calibri">CONTACT FORM</h3>
			<p class="center" style="font-size: 15px;">
				 We are so glad that you are contacting us.Fill the form below and submit to us. 
			</p>
 			<div style="background-color: steelblue;padding: 10px">
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
			@include('user.posts.tags')
		</div> <!--end of pd10 -->
		<div id="bottom20">
        	@include('user.newsletter.newsletter')
        </div>
	</div> <!--end of main-content -->
	@include('partials.sidebars_gen')
</div> <!--end of wrap -->
@endsection
