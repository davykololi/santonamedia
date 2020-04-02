@extends('layouts.app')

@section('title')
@parent
{{$video->title}}
@stop
 
@section('content')
    <main role="main" class="container" id="main">
        <div class="row">
            <div class="col-sm-8 blog-main">
                    <div class="blog-post">
                        @include('partials.video')
                        <p class="card-text" id="ffbdy">{{ $video->content }} <strong> This Article Has: </strong>
                        <span style="color:blue;">  {{$video->comments->count()}} {{ Str::plural('comment',$video->comments->count())}} </span> <i>. Be the first to comment.<span style="color: blue"> You must be logged in to comment</span></i>
                        <br/><br/>
                        <strong>Tags:</strong>
                        @foreach($video->tags as $tag)
                            <a href="{{route('video.tags',['slug' => $tag->slug])}}">
                            <label class="label label-info mg2px">{{$tag->name}}</label>
                            </a>
                        @endforeach
                        </p><hr/>
                        @include('partials.vdprevnext')
                        <br/>
                        @include('partials.share')             
                        <br/>
                        @include('user.videos.commentsDisplay')
                        <br/>
                        @include('user.videos.commentForm')
                        <hr/><hr/><br/>
                    </div><!-- /.blog-post -->
                    <br/>
                    @include('partials.vdext')      
            </div><!-- /.blog-main -->
            @include('partials.vd_aside')
        </div><!-- /.row -->
        <br/>
        @include('user.newsletter.newsletter')
        <br/>
    </main><!-- /.container -->
@endsection