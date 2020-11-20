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
                    <a class="btn btn-success" href="{!! route('posts.create') !!}"> Add Post</a>
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
                            <td class="table-text">
                                <div>{!! $post->category->name !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $post->title !!}</div>
                            </td>
                            <td class="table-text">
                            <img style = "width:15%" src="{!! $post->imageUrl() !!}" alt="{!! $post->title !!}">
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
                            	<form action="{!! route('posts.destroy', $post->id) !!}" method="POST">
                            		@csrf
                            		@method('DELETE')
                                	<a href="{!! route('posts.show', $post->id) !!}" class="label label-success">Details</a>
                                	<a href="{!! route('posts.edit', $post->id) !!}" class="label label-warning">Edit</a>
                                	<button type="submit" class="label label-danger" onclick="return confirm('Are you sure to delete {!! $post->title !!}?')">
                                     Delete
                                	</button>
                                </form>
                            </td>
                    @empty
                            <td class="table-text">
                                <div>You have not posted any article yet.</div>
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
