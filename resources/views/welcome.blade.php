@extends('layouts.app')
@section('title'| 'News')

@section('content')
<main role="main" class="container" id="main">
        <div class="row">
            @include('partials.sidebar')
            <div class="col-sm-6" id="content-area">
            @if(!empty($posts))
               @forelse($posts as $post)
                    <div class="blog-post">
                        @include('partials.post')
                        <p class="card-text">{!! Str::limit($post->content,$limit=30,$end= '...') !!}
                            <a class="btn btn" id="button" href="{{ route('users.posts.read', ['post_slug' => $post->slug]) }}" >Read more <i class="fa fa-angle-double-right"></i>
                            </a> 
                        </p>
                        <br/> <br/><hr/>
                    </div><!-- /.blog-post -->
                @empty
                <p style="color: red;font-family: Segoe UI Light;font-size: 30px"> Sorry esteemed reader. We are yet to post <a href="#"> {{ config('app.name', 'santonamedia') }} Blog </a> articles.</p>
                @endforelse
            @endif
                <nav class="blog-pagination">
                    {{ $posts->links() }}
                </nav>
                @include('user.posts.tags')
            </div><!-- /.blog-main -->
        @include('partials.aside_w')
        </div><!-- /.row -->
        <br/>
        @include('user.newsletter.newsletter')
        <br/>
</main><!-- /.container -->       

    
@endsection
