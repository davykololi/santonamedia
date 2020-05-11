@extends('layouts.app')
@section('title'|'Articles')

@section('content')
    <div class="wrap">
        <div id="main-content">
            <div class="pd10">
            @forelse($posts as $post)
                <div class="blog-post">
                    @include('partials.post')
                        <p class="card-text" id="ffbdy">{!! Str::limit($post->content,$limit=30,$end= '...') !!}
                            <a class="btn btn-default" id="button" href="{{ route('users.posts.read', ['post_slug' => $post->slug]) }}">
                            Read more <i class="fa fa-angle-double-right"></i>
                            </a> 
                        </p>
                        <br/><hr/>
                </div><!-- /.blog-post -->
            @empty
                <p style="color: red;font-family: Segoe UI Light;font-size: 30px"> Sorry esteemed reader. We are yet to post the <a href="#"> {{strtolower($category->name)}}</a> articles.</p>
            @endforelse
                <div class="ui card blogger-card fluid no-box-shadow text-center"> 
                    {{ $posts->links() }}
                </div>
                @include('user.posts.tags')
            </div> <!--end of pd10 -->
            <div id="bottom20">
                @include('user.newsletter.newsletter')
            </div>
        </div><!-- end of main-content -->
        @include('partials.postread_sidebars')
    </div><!-- end of wrap -->
@endsection

