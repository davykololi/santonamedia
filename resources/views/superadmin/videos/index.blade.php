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
                    <a class="btn btn-success" href="{{route('superadmin.videos.create')}}"> Add Video</a>
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
                            <td class="table-text">
                                <div>{!! $video->category->name !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $video->title !!}</div>
                            </td>
                            <td class="table-text">
                            <video width="40" height="30" controls> 
                                <source type="video/mp4" src="{!! $video->videoUrl() !!}">
                                	This browser doesn't support video tag.
                            </video>
                            </td>
                            <td class="table-text">
                                <div>{!! $video->caption !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! Illuminate\Support\Str::words($video->description,10,'...') !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $video->excerpt() !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $video->created_at !!}</div>
                            </td>
                            <td>
                                <form action="{!! route('superadmin.videos.destroy', $video->id) !!}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{!! route('superadmin.videos.show', $video->id) !!}" class="label label-success">Details</a>
                                    <a href="{!! route('superadmin.videos.edit', $video->id) !!}" class="label label-warning">Edit</a>
                                    <button type="submit" class="label label-danger" onclick="return confirm('Are you sure to delete  {!! $video->title !!}?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                    @empty
                            <td colspan="10">
                                <div style="font-size: 16px;color: red;font-family: Times New Roman">
                                    <h3>You have not posted any video(s) yet.</h3>
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
