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
                    <a class="btn btn-success" href="{!! route('admin.posts.create') !!}"> Add Post</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    @include('partials.thead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td class="table-text">
                                <div>{!! $post->category->name !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $post->title !!}</div>
                            </td>
                            <td class="table-text">
                            <img style = "width:15%" src="/storage/public/storage/{!! $post->image !!}">
                            </td>
                            <td class="table-text">
                                <div>{!! $post->caption !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! Illuminate\Support\Str::words($post->summary,5,'...') !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! Illuminate\Support\Str::words($post->content,5,'...') !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $post->created_at !!}</div>
                            </td>
                            <td>
                                <a href="{!! route('admin.posts.show', $post->id) !!}" class="label label-success">Details</a>
                                <a href="{!! route('admin.posts.edit', $post->id) !!}" class="label label-warning">Edit</a>
                                <a href="{!! route('admin.posts.delete', $post->id) !!}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</div>
</main>
@endsection
