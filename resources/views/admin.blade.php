@extends('layouts.adminmaster')
@section('title'|'Admin')
 
@section('content')
    <div class="container" id="main">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin Dashboard</div>
 
                    <div class="panel-body">
                        @component('components.who-is-logged-in')
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection