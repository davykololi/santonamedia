@extends('layouts.adminmaster')
@section('title', '| Create Category')

@section('content')
<main role="main" class="container" id="main">
<br/>
<div class="row" id="lightblue">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="titles"> ADD CATEGORY </h3>
                    <a href="{{ route('admin.categories.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('admin.categories.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="POST">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="Category name" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" class="form-control" value="{{old('description')}}" placeholder="Brief description of the category." required autofocus>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Key Words</label>
                        <div class="col-sm-10">
                            <textarea name="keywords" id="keywords" class="form-control" value="{{old('keywords')}}" placeholder="Enter your keywords separated by commas." required="">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" value="Create"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
