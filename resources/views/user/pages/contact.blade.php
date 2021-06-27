@extends('layouts.app')

@section('content')
@include('partials.allnews')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
        @include('partials.messages')
		@include('partials.errors')
          <div class="contact_area">
            <h2>Contact Us</h2>
            <p><b>We are glad that you are contacting us. Fill in the form below and submit to us.</b></p>
            {!! Form::open(['route'=>'contactus.store']) !!}
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					{!! Form::label('Name:') !!}
					{!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Name']) !!}
					<span class="text-danger">{{ $errors->first('name') }}</span>
				</div>
				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					{!! Form::label('Email:') !!}
					{!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Email Address']) !!}
					<span class="text-danger">{{ $errors->first('email') }}</span>
				</div>
				<div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
					{!! Form::label('Subject:') !!}
					{!! Form::text('subject', old('subject'), ['class'=>'form-control', 'placeholder'=>'Subject']) !!}
					<span class="text-danger">{{ $errors->first('subject') }}</span>
				</div>
				<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
					{!! Form::label('Message:') !!}
					{!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Message']) !!}
					<span class="text-danger">{{ $errors->first('message') }}</span>
				</div>
				<div class="form-group">
          			<button class="btn btn-theme" value="submit">Submit</button>
				</div>
			{!! Form::close() !!}
          </div>
          @include('user.posts.tags')
          @include('user.newsletter.newsletter')
          <br/><br/>
        </div>
      </div>
      @include('partials.latest_posts')
      @include('partials.aside_postextension')
    </div>
  </section>
@endsection
