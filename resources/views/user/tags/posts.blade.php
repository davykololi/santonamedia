@extends('layouts.app')
@section('title'|'Articles')

@section('content')
    <main role="main" class="container" id="main">
        <div class="row">
            @include('partials.sidebar')
            <div class="col-sm-6" id="content-area">
               @forelse($posts as $post)
                    <div class="blog-post">
                        @include('partials.tagpost')
                        <p class="card-text" id="ffbdy">{!! Str::limit($post->content,$limit=30,$end= '...') !!}
                            <a class="btn btn-default" id="button" href="{{ route('users.posts.read', ['post_slug' => $post->slug]) }}" >
                            Read more <i class="fa fa-angle-double-right"></i>
                            </a> 
                        </p>
                        <br/><hr/>
                    </div><!-- /.blog-post -->
                @empty
                <p style="color: red;font-family: Segoe UI Light;font-size: 30px"> Sorry esteemed reader. We are yet to post the <a href="#"> {{$tag->name}}</a> articles.
                </p>
                @endforelse
                <div class="ui card blogger-card fluid no-box-shadow text-center"> 
                    {{ $posts->render() }}
                </div>
                @include('user.posts.tags')
            </div><!-- /.blog-main -->
            @include('partials.posttag_aside')
        </div><!-- /.row -->
        <br/>
        @include('user.newsletter.newsletter')
        <br/>
    </main><!-- /.container -->
@endsection

