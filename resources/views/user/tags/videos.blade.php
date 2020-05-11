@extends('layouts.app')
@section('title'|'Articles')

@section('content')
    <div class="wrap">
        <div id="main-content">
            <div class="pd10">
               @forelse($videos as $video)
                    <div class="blog-post">
                        @include('partials.tagvideo')
                        <p class="card-text" id="ffbdy">{!! Str::limit($video->content,$limit=30,$end= '...') !!}
                            <a class="btn btn-default" id="button" href="{{ route('users.videos.read', ['video_slug' => $video->slug]) }}" >
                            Read more <i class="fa fa-angle-double-right"></i>
                            </a> 
                        </p>
                        <br/><hr/>
                    </div><!-- /.blog-post -->
                @empty
                <p style="color: red;font-family: Segoe UI Light;font-size: 30px"> Sorry esteemed reader. We are yet to post the <a href="#"> {{$tag->name}}</a> videos.
                </p>
                @endforelse
                <div class="ui card blogger-card fluid no-box-shadow text-center"> 
                    {{ $videos->links() }}
                </div>
                @include('user.videos.tags')
            </div> <!--end of pd10 -->
            <div id="bottom20">
                @include('user.newsletter.newsletter')
            </div>
        </div><!-- end of main-content -->
            @include('partials.videocat_sidebars')
    </div><!-- end of wrap -->
@endsection

