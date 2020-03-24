<h2 class="title blue" style="font-size: 20px;text-align: center;"> RECOMMENDED VIDEOS</h2>
@if(!empty($videos))
    @foreach($videos as $video)
        <div class="blog-post">
            @include('partials.video')
                <p class="card-text">{!! Str::limit($video->content,$limit=30,$end= '...') !!}
                <a class="btn btn-default" id="button" href="{{ route('users.videos.read', ['video_slug' => $video->slug]) }}" >Read more &rarr;</a> 
                </p>
                <br/> <br/><hr/>
        </div><!-- /.blog-post -->
    @endforeach
@endif
        <nav> 
            {{ $videos->render() }}
        </nav>
        @include('user.videos.tags')