@if(!empty($popular))
@foreach($popular as $post)
<a id="white" href="{{ route('users.posts.read', ['video_slug' => $video->slug]) }}" >{{ $video->title }}</a>
@endforeach
@endif
            