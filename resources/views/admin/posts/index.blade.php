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
                    @include('partials.tbhead')
                    <!-- Table Body -->
                    <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <td class="table-text">
                                <div>{!! $post->category->name !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $post->title !!}</div>
                            </td>
                            <td class="table-text">
                                <img style = "width:15%" src="/storage/public/storage/{!! $post->image !!}" alt="{!! $post->title !!}"/>
                            </td>
                            <td class="table-text">
                                <div>{!! $post->caption !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! Illuminate\Support\Str::words($post->description,5,'...') !!}</div>
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
                                <a href="{!! route('admin.posts.delete', $post->id) !!}" class="label label-danger" onclick="return confirm('Are you sure to delete {!! $post->title !!}?')">
                                    Delete
                                </a>
                            </td>
                    @empty
                            <td colspan="10">
                                <div style="font-size: 16px;color: red;font-family: Times New Roman">
                                	<h3>You have not posted any article yet.</h3>
                            	</div>
                            </td>
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
