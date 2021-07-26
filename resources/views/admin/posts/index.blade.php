@extends('layouts.adminmaster')
@section('title', '| All Posts')

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
                    <a class="btn btn-success" href="{!! route('admin.posts.create') !!}">Add Post</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-bordered mt-5">
                    <!-- Table Headings -->
                    @include('partials.super_n_admin_tbhead')
                    <!-- Table Body -->
                    <tbody>
                    @forelse($posts as $post)
                        <tr>
                            @include('ext._posts_table_data')
                            @include('ext._posts_table_adminroutes')
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
