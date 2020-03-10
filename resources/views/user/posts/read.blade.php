@extends('layouts.app')

@section('title')
@parent
{{$post->title}}
@stop
 
@section('content')
    <main role="main" class="container" id="main">
        <div class="row">
            <div class="col-sm-8 blog-main">
                    <div class="blog-post">
                        @include('partials.post')
                        <p class="card-text" id="ffbdy">{{ $post->content }} <strong> This Article Has: </strong>
                        <span style="color:blue;">  {{$post->comments->count()}} {{ Str::plural('comment',$post->comments->count())}} </span> <i>. Be the first to comment.<span style="color: blue"> You must be logged in to comment</span></i>
                        <br/>
                        <strong>Tags:</strong>
                        @foreach($post->tags as $tag)
                            <a href="{{route('categories',['slug' => $category->slug])}}">
                            <label class="label label-info">{{$tag->name}}</label>
                            </a>
                        @endforeach
                        </p><hr/>
                        @include('partials.prevnext')
                        <br/>
                        @include('partials.share')             
                        <br/>
                        @include('user.posts.commentsDisplay')
                        <br/>
                        @include('user.posts.commentForm')
                        <hr/><hr/><br/>
                    </div><!-- /.blog-post -->
                    <br/>
                    @include('partials.ext')      
            </div><!-- /.blog-main -->
            @include('partials.aside')
        </div><!-- /.row -->
        <br/>
        @include('partials.newsletter')
        <br/>
    </main><!-- /.container -->
@endsection
