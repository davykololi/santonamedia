@extends('layouts.app')
@section('title'|'Home')

@section('content')
    <div class="wrap">
        <div id="main-content">
            <div class="pd10">
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
            </div> <!--end of pd10 -->
            <div id="bottom20">
                @include('user.newsletter.newsletter')
            </div>
        </div><!-- end main-content -->
        @include('partials.sidebars_gen')
    </div> <!-- end class wrap -->
@endsection