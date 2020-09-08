@extends('layouts.superadmin')
@section('title', '| Edit Admin')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit User<a href="{{ route('admins.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('admins.update', $admin->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $admin->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" value="{{ $admin->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" class="form-control" value="{{ $admin->email }}">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" class="form-control" value="{{ $admin->image }}">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Phone No</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_no" id="phone_no" class="form-control" value="{{ $admin->phone_no }}">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Area Served</label>
                        <div class="col-sm-10">
                            <input type="text" name="area" id="area" class="form-control" value="{{ $admin->area }}">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Keywords</label>
                        <div class="col-sm-10">
                            <input type="text" name="keywords" id="keywords" class="form-control" value="{{ $admin->keywords }}">
                        </div>
                    </div> 
                    <div class="form-group row mb-0">
                    	<div class="col-md-6 offset-md-4">
                        	<button type="submit" class="btn btn-primary">
                            	Update
                            </button>
                    	</div>
                 	</div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
