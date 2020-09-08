<div>
	@if(!empty($articles))
	@foreach($articles as $article)
	<li class="nav-link">
		<a id="white" href="{!! route('users.videos.read', ['video_slug' => $video->slug]) !!}"> {!! $video->title !!} </a>
	</li>
	@endforeach
	@endif
</div>