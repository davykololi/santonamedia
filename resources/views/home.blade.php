@extends('layouts.app')
@section('title'|'Home')

@section('content')
    <div class="container-fluid features">
        <div class="row">
            @include('partials.sidebar_left_col')
            <main class="col-lg-6 col-md-6 col-sm-12 main-content">
            @if(!empty($posts))
               @forelse($posts as $post)
                    <div class="blog-post">
                        @include('partials.post')
                        <p class="card-text">{!! Str::limit($post->content,$limit=30,$end= '...') !!}
                            <a class="btn btn-primary" href="{{ route('users.posts.read', ['post_slug' => $post->slug]) }}" >Read more <i class="fa fa-angle-double-right"></i>
                            </a> 
                        </p>
                        <br/> <br/><hr/>
                    </div><!-- /.blog-post -->
                @empty
                <p style="color: red;font-family: Segoe UI Light;font-size: 30px"> 
                    Sorry esteemed reader. We are yet to post <a href="#"> {{ config('app.name', 'SKYLUX') }} Blog </a> articles.
                </p>
                @endforelse
            @endif
                <nav class="blog-pagination">
                    {{ $posts->links() }}
                </nav>
                @include('user.posts.tags')
                @include('user.newsletter.newsletter')
            </main> <!-- /.blog-main -->
            @include('partials.sidebar_right_hcol')
        </div><!-- /.row -->
    </div> <!-- /.container -->
@endsection

