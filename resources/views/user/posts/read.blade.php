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
                        <p style="font-family: Segoe UI Semilight;font-size: 15px">{{ $post->content }} <strong> Has: </strong>
                        <span style="color:blue;">  {{$post->comments->count()}} {{ Str::plural('comment',$post->comments->count())}} </span> <i>. Be the first to comment.<span style="color: red"> You must be logged in to comment</span></i>
                        </p><hr/>
                        @include('partials.prevnext')
                        <br/>
                        @include('partials.share')              
                        <br/>
                        @auth
                            <Comments 
                                :post-id = '@json($post->id)'
                                :user-name = '@json(auth()->user()->name)'
                                :user-avatar ='@json(auth()->user()->avatar)'>
                            </Comments>
                        @endauth
                    </div><!-- /.blog-post -->
                    <br/>
                    @include('partials.ext')        
            </div><!-- /.blog-main -->
            @include('partials.aside')
        </div><!-- /.row -->
    </main><!-- /.container -->
@endsection
