@extends('layouts.superadmin')
@section('title', '| Superadmin Posts')

@section('content')
<main role="main" class="container" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($posts))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <br/>
                    <h3 class="titles">POSTS LIST</h3>
                </div>
                <div class="pull-right">
                    <br/>
                    <a class="btn btn-success" href="{!! route('superadmin.posts.create') !!}"> Add Post</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    @include('partials.superadmin_posttbhead')
                    <!-- Table Body -->
                    <tbody>
                    @forelse($posts as $post)
                        <tr>
                            @include('ext._posts_table_data')
                            @include('ext._posts_table_superadminroutes')
                    @empty
                            @include('ext._posts_table_emptyinfo')
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">{!! $posts->links() !!}</div>
            </div>
        </div>
    @endif
    </div>
</div>
</main>
@endsection
