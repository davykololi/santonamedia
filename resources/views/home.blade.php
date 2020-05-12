@extends('layouts.app')
@section('title'|'Home')

@section('content')
    <main role="main" class="container-fluid" id="margtop60">
        <div class="row" id="dispflex">
            <div class="col-sm-3">
                @include('partials.sidebar')
            </div>
            <div class="blog-main col-sm-6" id="main-content">
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
                <p style="color: red;font-family: Segoe UI Light;font-size: 30px"> Sorry esteemed reader. We are yet to post <a href="#"> {{ config('app.name', 'SKYLUX') }} Blog </a> articles.</p>
                @endforelse
            @endif
                <nav class="blog-pagination">
                    {{ $posts->links() }}
                </nav>
                @include('user.posts.tags')
                @include('user.newsletter.newsletter')
            </div><!-- /.blog-main -->
            <div class="col-sm-3">
                @include('partials.aside_h')
            </div>
        </div><!-- /.row -->
    </main> <!-- /.container -->
@endsection

