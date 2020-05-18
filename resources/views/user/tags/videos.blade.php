@extends('layouts.app')
@section('title'|'Articles')

@section('content')
<div class="container-fluid features">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12">
            @include('partials.sidebar')
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 main-content"><!-- blog-main-->
               @forelse($videos as $video)
                    <div class="blog-post left-ten">
                        @include('partials.tagvideo')
                        <p class="card-text">{!! Str::limit($video->content,$limit=30,$end= '...') !!}
                            <a class="btn btn-default" id="button" href="{{ route('users.videos.read', ['video_slug' => $video->slug]) }}" >
                            Read more <i class="fa fa-angle-double-right"></i>
                            </a> 
                        </p>
                        <br/><hr/>
                    </div><!-- /.blog-post -->
                @empty
                <p style="color: red;font-family: Segoe UI Light;font-size: 30px"> 
                    Sorry esteemed reader. We are yet to post the <a href="#"> {{$tag->name}}</a> videos.
                </p>
                @endforelse
                <div class="ui card blogger-card fluid no-box-shadow text-center"> 
                    {{ $videos->links() }}
                </div>
                @include('user.videos.tags')
                @include('user.newsletter.newsletter')
        </div> <!--end of blog-main -->
        <div class="col-lg-3 col-md-3 col-sm-12">
            @include('partials.videotag_aside')
        </div>   
    </div><!-- end of row -->
</div> <!-- end of main -->
@endsection

