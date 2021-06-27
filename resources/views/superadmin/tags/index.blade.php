@extends('layouts.superadmin')
@section('title', '| All Tags')

@section('content')
<main role="main" class="container" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.messages')
        @include('partials.errors')
    <!-- Posts list -->
    @if(!empty($tags))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <br/>
                    <h3 class="titles">TAGS LIST</h3>
                </div>
                <div class="pull-right">
                    <br/>
                    <a class="btn btn-success" href="{!! route('superadmin.tags.create') !!}"> Add Tag</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    @include('partials.taghead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td class="table-text">
                                <div>{!! $tag->name !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $tag->slug !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! Str::limit($tag->desc,$limit=30,$end= '...') !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $tag->created_at !!}</div>
                            </td>
                            <td>
                                <a href="{!! route('superadmin.tags.show', $tag->id) !!}" class="label label-success">Details</a>
                                <a href="{!! route('superadmin.tags.edit', $tag->id) !!}" class="label label-warning">Edit</a>
                                <a href="{!! route('superadmin.tags.delete', $tag->id) !!}" class="label label-danger" onclick="return confirm('Are you sure to delete {!! $tag->name !!}?')">
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
