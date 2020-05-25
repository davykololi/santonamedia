@extends('layouts.app')
@section('title', '| Contact Us')

@section('content')
<div class="container-fluid features">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12">
            @include('partials.sidebar')
        </div>
		<div class="col-lg-6 col-md-6 col-sm-12 main-content">
		@include('partials.messages')
		@include('partials.errors')
			<div class="headings"> <h6>CONTACT FORM</h6> </div>
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
					<button class="btn btn-primary" value="submit">Submit</button>
				</div>
			{!! Form::close() !!}
			</div>
			@include('user.posts.tags')
			@include('user.newsletter.newsletter')
		</div> <!--end of blog-main -->
		<div class="col-lg-3 col-md-3 col-sm-12">
            @include('partials.aside_h')
        </div>
	</div> <!--end of row -->
</div>
@endsection
