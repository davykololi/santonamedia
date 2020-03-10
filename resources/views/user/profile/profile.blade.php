@extends('layouts.app')
@section('title'|'Profile')

@section('content')
	<div class="container" id="main">
		<div class="row">
			@include('partials.messages')
			@include('partials.errors')
		</div>
		<div class="row justify-content-center">
			<div class="profile-header-container">
				<div class="profile-header-img">
					<img height="10%" width="10%" class="rounded-circle" src="/storage/avatars/{{$user->avatar}}"/>
					<!--badge-->
					<div class="rank-label-container">
						<span class="label label-default rank-label">{{$user->name}}</span>
					</div>
				</div>
			</div>
		</div>

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
	</div>
@endsection