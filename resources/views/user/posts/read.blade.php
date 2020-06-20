@extends('layouts.app')

@section('title')
@parent
{{$post->title}}
@stop
 
@section('content')
<main class="container features">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 main-content"><!-- blog-main-->
            <div class="blog-post">
                @include('partials.post')
                    <p class="card-text">{{ nl2br(e($post->content)) }}. 
                        <strong> Has: </strong>
                        <span style="color:blue;">  {{$post->comments->count()}} {{ Str::plural('comment',$post->comments->count())}} </span> <i>. Be the first to comment.<span class="red"> You must be logged in to comment</span></i>
                    </p>
                    @include('partials.readposttags')
                    <hr/>
                    @include('partials.prevnext')
                    <br/>
                    @include('partials.sharea')             
                    <br/><br/>
                    @include('user.posts.commentForm')
                    <br/>
                    @include('user.posts.commentsDisplay')
                    <hr class="style-four"> 
            </div><!-- /.blog-post -->
            @include('partials.ext')
            @include('user.posts.tags')
            @include('user.newsletter.newsletter')
        </div> <!--end of blog-main-->
        @include('partials.sidebar_right_asidecol')
    </div><!--end of row -->
</main> <!-- end of main -->
@endsection
