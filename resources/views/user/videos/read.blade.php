@extends('layouts.app')

@section('title')
@parent
{{$video->title}}
@stop
 
@section('content')
<div class="container-fluid features">
    <div class="row">
        @include('partials.sidebar_left_col')
        <main class="col-lg-6 col-md-6 col-sm-12 main-content"><!-- blog-main-->
            <div class="blog-post">
                @include('partials.video')
                    <p class="card-text">{{ $video->content }} 
                        <strong> This Article Has: </strong>
                        <span style="color:blue;">  {{$video->comments->count()}} {{ Str::plural('comment',$video->comments->count())}} </span> <i>. Be the first to comment.<span class="red"> You must be logged in to comment</span></i>
                        <br/><br/>
                    </p>
                    <div class="tags">
                        <strong>Tags:</strong>
                            @foreach($video->tags as $tag)
                                <a href="{{route('video.tags',['slug' => $tag->slug])}}">
                                    <label class="label label-info">{{$tag->name}}</label>
                                </a>
                            @endforeach
                    </div>
                    <hr/>
                    @include('partials.vdprevnext')
                    <br/>
                    @include('partials.sharea')             
                    <br/><br/>
                    @include('user.videos.commentForm')
                    <br/>
                    @include('user.videos.commentsDisplay')
                    <hr class="style-four">
            </div><!-- /.blog-post -->
            @include('partials.vdext')
            @include('user.videos.tags')
            @include('user.newsletter.newsletter')
        </main> <!--end of blog-main -->
        @include('partials.sidebar_right_vdcol')
    </div><!-- end of row -->
</div> <!-- end of container -->
@endsection
