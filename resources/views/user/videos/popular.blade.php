@if(!empty($popular))
@foreach($popular as $video)
<a id="white" href="{{ route('users.videos.read', ['video_slug' => $video->slug]) }}" >{{ $video->title }}</a>
@endforeach
@endif
            