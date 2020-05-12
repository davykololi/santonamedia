@extends('layouts.app')
@section('title', '| Contact Us')

@section('content')
<main role="main" class="container-fluid" id="margtop60">
	<div class="row" id="dispflex">
		<div class="col-sm-3">
            @include('partials.sidebar')
        </div>
		<div class="blog-main col-sm-6" id="main-content">
		@include('partials.messages')
		@include('partials.errors')
			<div id="headings"> <h3 class="calibri">CONTACT FORM</h3> </div>
			<p style="font-size: 15px;text-align: center;">
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
			@include('user.newsletter.newsletter')
		</div> <!--end of blog-main -->
		<div class="col-sm-3">
            @include('partials.aside_h')
        </div>
	</div> <!--end of row -->
</main>
@endsection
