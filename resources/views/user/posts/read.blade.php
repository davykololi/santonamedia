@extends('layouts.app')

@section('title')
@parent
{{$post->title}}
@stop
 
@section('content')
<div class="container-fluid features">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12">
            @include('partials.sidebar')
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 main-content"><!-- blog-main-->
            <div class="blog-post">
                @include('partials.post')
                    <p class="card-text">{{ $post->content }}. 
                        <strong> Has: </strong>
                        <span style="color:blue;">  {{$post->comments->count()}} {{ Str::plural('comment',$post->comments->count())}} </span> <i>. Be the first to comment.<span class="red"> You must be logged in to comment</span></i>
                        <br/><br/>
                    </p>
                    <div class="tags">
                        <strong>Tags:</strong>
                            @foreach($post->tags as $tag)
                                <a href="{{route('post.tags',['slug' => $tag->slug])}}">
                                    <label class="label label-info">{{$tag->name}}</label>
                                </a>
                            @endforeach
                    </div>
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
        <div class="col-lg-3 col-md-3 col-sm-12">
            @include('partials.aside')
        </div>
    </div><!--end of row -->
</div> <!-- end of main -->
@endsection
