@extends('layouts.superadmin')
@section('title', '| Superadmin Videos')

@section('content')
<main role="main" class="container" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($videos))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <br/>
                    <h3 class="titles">VIDEOS LIST</h3>
                </div>
                <div class="pull-right">
                    <br/>
                    <a class="btn btn-success" href="{{route('superadmin.videos.create')}}">Add Video</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    @include('partials.vdhead')
                    <!-- Table Body -->
                    <tbody>
                    @forelse($videos as $video)
                        <tr>
                            @include('ext._videos_table_data')
                            @include('ext._videos_table_superadminroutes')
                    @empty
                            @include('ext._videos_table_emptyinfo')
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</div>
</main>
@endsection
