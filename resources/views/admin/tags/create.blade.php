@extends('layouts.adminmaster')
@section('title', '| Add Tag')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<br/>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="titles">NEW TAG</h3> 
                <a href="{{ route('admin.tags.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('admin.tags.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Tag Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" placeholder="Tag name here">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" id="desc" value="{{old('desc')}}" class="form-control" placeholder="In less than 50 words describe your tag">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Keywords</label>
                        <div class="col-sm-10">
                            <input type="text" name="keywords" id="keywords" value="{{old('keywords')}}" class="form-control" placeholder="Write keywords here">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn" id="button" value="Add Tag" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
