@extends('layouts.app')

@section('title')
@parent
{{$post->title}}
@stop
 
@section('content')
<main role="main" class="container-fluid" id="margtop60">
    <div class="row" id="dispflex">
        <div class="col-sm-3">
            @include('partials.sidebar')
        </div>
        <div class="blog-main col-sm-6" id="main-content"><!-- blog-main-->
            <div class="blog-post">
                @include('partials.post')
                    <p class="card-text" id="ffbdy">{{ $post->content }}. 
                        <strong> Has: </strong>
                        <span style="color:blue;">  {{$post->comments->count()}} {{ Str::plural('comment',$post->comments->count())}} </span> <i>. Be the first to comment.<span class="red"> You must be logged in to comment</span></i>
                        <br/><br/>
                    </p>
                    <div id="ffbdy">
                        <strong>Tags:</strong>
                            @foreach($post->tags as $tag)
                                <a href="{{route('post.tags',['slug' => $tag->slug])}}">
                                    <label class="label label-info mg2px">{{$tag->name}}</label>
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
        <div class="col-sm-3">
            @include('partials.aside')
        </div>
    </div><!--end of row -->
</main> <!-- end of main -->
@endsection
