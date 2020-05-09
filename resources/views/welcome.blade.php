@extends('layouts.app')
@section('title'| 'News')

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
                <p style="color: red;font-family: Segoe UI Light;font-size: 30px"> Sorry esteemed reader. We are yet to post <a href="#"> {{ config('app.name', 'santonamedia') }} Blog </a> articles.</p>
                @endforelse
            @endif
                <nav class="blog-pagination">
                    {{ $posts->links() }}
                </nav>
                @include('partials.newsltags')
            </div> <!--end of pd10 -->
        </div><!-- end of main-content -->
        @include('partials.sidebars')
</div> <!-- end of wrap -->        
@endsection
