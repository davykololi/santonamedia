@extends('layouts.app')
@section('title'|'Videos')

@section('content')
<main class="container features">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 main-content"><!-- blog-main-->
            @forelse($videos as $video)
                <div class="blog-post">
                @include('partials.video')
                    <p class="card-text">{!! Str::limit($video->content,$limit=30,$end= '...') !!}
                        <a class="btn btn-primary" href="{{ route('users.videos.read',['video_slug' => $video->slug]) }}" >
                            Read more <i class="fa fa-angle-double-right"></i>
                        </a> 
                    </p>
                    <hr/>
                </div><!-- /.blog-post -->
            @empty
                <p style="color: red;font-family: Segoe UI Light;font-size: 30px"> 
                    Sorry esteemed reader. We are yet to post the <a href="#"> {{strtolower($category->name)}}</a> videos.
                </p>
            @endforelse
            <div class="ui card blogger-card fluid no-box-shadow text-center"> 
                {{ $videos->links() }}
            </div>
            @include('user.videos.tags')
            @include('user.newsletter.newsletter')
        </div> <!-- end of blog-main -->
        <div class="col-lg-4 col-md-4 col-sm-4">
            @include('partials.vd_aside')
        </div>
    </div><!-- end of row -->
</main> <!-- end of main -->
@endsection

