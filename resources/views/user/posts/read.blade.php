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
                        <br/>
                        @include('user.posts.commentForm')
                        <br/>
                        @include('user.posts.commentsDisplay')
                        <hr class="style-four"> 
                    </div><!-- /.blog-post -->
                    @include('partials.ext')      
            </div><!-- /.blog-main -->
            @include('partials.aside')
        </div><!-- /.row -->
        <br/>
        @include('user.newsletter.newsletter')
        <br/>
    </main><!-- /.container -->
@endsection
