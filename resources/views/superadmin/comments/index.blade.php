@extends('layouts.superadmin')
@section('title', '| Comments')

@section('content')
<main role="main" class="container" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($comments))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3 class="titles">COMMENTS LIST </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    @include('partials.cmdhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td class="table-text">
                                <div>{!! $comment->user->name !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $comment->category->name !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $comment->content !!}</div>
                            </td>
                            <td class="table-text">
                                @foreach($comment->category->posts as $post)
                                <div>{!! $post->title !!}</div>
                                @endforeach
                                @foreach($comment->category->videos as $video)
                                <div>{!! $video->title !!}</div>
                                @endforeach
                            </td>
                            <td class="table-text">
                                <div>{!! $comment->created_date !!}</div>
                            </td>
                            <td>
                                <a href="{!! route('superadmin.comments.index', $comment->id) !!}" class="label label-success">Details</a>
                                <a href="{!! route('superadmin.comments.delete', $comment->id) !!}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
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
