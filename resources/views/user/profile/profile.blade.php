@extends('layouts.app')
@section('title'|'Profile')

@section('content')
	<div class="container" id="main">
		<div class="titles" style="margin-top: 20px;text-align: center">
			<h3>USER PROFILE</h3>
		</div>
		<div class="row" style="margin-top: 50px;margin-left: 200px">
			@include('partials.messages')
			@include('partials.errors')
			<div class="profile-header-container">
				<div class="profile-header-img">
					<img height="120px" width="120px" class="frame" src="/storage/avatars/{{$user->avatar}}" onerror="this.src='{{asset('static/avatar.png')}}'" />
					<!--badge-->
					<div class="rank-label-container">
						<span class="label label-default rank-label">{{$user->name}} {{$user->username}}</span>
					</div>
				</div>
			</div>
		</div>
		<h5 style="margin-top: 20px;text-align: center;">Update your profile image </h5>
		<div class="row justify-content-center">
			<form action="/profile" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group row">
					<input type="file" class="form-control-file"  name="avatar" id="avatarFile" aria-describedby="fileHelp">
					<small id="fileHelp" class="form-text text-muted">Please upload a valid image</small>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<br/>
		@include('user.newsletter.newsletter')
		<br/>
	</div>
@endsection