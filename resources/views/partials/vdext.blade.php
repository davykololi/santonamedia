<div class="box">Related Videos</div>
@if(!empty($videos))
    @foreach($videos as $video)
        <div class="blog-post">
            @include('partials.videoext')
                <p class="card-text">{!! Str::limit($video->content,$limit=30,$end= '...') !!}
                    <a class="btn btn-primary" href="{{ route('users.videos.read',['video_slug' => $video->slug]) }}" >
                        Read more <i class="fa fa-angle-double-right"></i>
                    </a> 
                </p>
                <br/><br/><hr/>
        </div><!-- /.blog-post -->
    @endforeach
@endif
        <nav> 
            {{ $videos->render() }}
        </nav>